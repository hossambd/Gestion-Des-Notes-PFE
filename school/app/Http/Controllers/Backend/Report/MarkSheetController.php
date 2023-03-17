<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\Module;
use App\Models\Annee;
use App\Models\Element;
use App\Models\AssignElement;
use App\Models\Semestre;
use App\Models\MarksGrade;
use PDF;
use DB;

class MarkSheetController extends Controller
{
    public function MarkSheetView(){

    	$data['semestres'] = Semestre::orderBy('id','asc')->get();
		$data['annees'] = Annee::all();
		$data['modules'] = Module::all();
		$data['elements'] = Element::all();
    	$data['exam_type'] = ExamType::all();
    	return view('backend.report.marksheet.marksheet_view',$data);

    }


    public function MarkSheetGet(Request $request){
		$annee_id = $request->annee_id;
    	$semestre_id = $request->semestre_id;
    //	$module_id = $request->module_id;
    	$exam_type_id = $request->exam_type_id;
    	$cne = $request->cne;

    $count_fail = StudentMarks::where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('exam_type_id',$exam_type_id)->where('cne',$cne)->where('marks','<','33')->get()->count();
    	// dd($count_fail);
    $singleStudent = StudentMarks::where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('exam_type_id',$exam_type_id)->where('cne',$cne)->first();
    if ($singleStudent == true) {
    
    $allMarks = StudentMarks::with(['element','annee','module'])->where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('exam_type_id',$exam_type_id)->where('cne',$cne)->get();
    //dd($allMarks->toArray());
	$allGrades = MarksGrade::all();
	$data['detailsData']=AssignElement::where('semestre_id',$semestre_id)->orderBy('module_id','asc')->get();
    return view('backend.report.marksheet.marksheet_pdf',$data,compact('allMarks','allGrades','count_fail'));

    }else{

    	$notification = array(
    		'message' => 'Aucune correspondance',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
       }


    } // end Method 

	public function MarkSheetDetails(Request $request){
		
	   $annee_id = $request->annee_id;
	   $semestre_id = $request->semestre_id;
   //	$module_id = $request->module_id;
	   $exam_type_id = $request->exam_type_id;
	   $cne = $request->cne;

   $count_fail = StudentMarks::where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('exam_type_id',$exam_type_id)->where('cne',$cne)->where('marks','<','33')->get()->count();
	   // dd($count_fail);
   $singleStudent = StudentMarks::where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('exam_type_id',$exam_type_id)->where('cne',$cne)->first();
   if ($singleStudent == true) {
   
   $data['allMarks']= StudentMarks::with(['element','annee','module'])->where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('exam_type_id',$exam_type_id)->where('cne',$cne)->get();
   //dd($allMarks->toArray());
   $allGrades = MarksGrade::all();
   $data['detailsData']=AssignElement::where('semestre_id',$semestre_id)->orderBy('module_id','asc')->get();
   
//dd($allMarks);
   $pdf = PDF::loadView('backend.report.marksheet.marksheet_details_pdf',$data);
   $pdf->SetProtection(['copy', 'print'], '', 'pass');
   
   return $pdf->stream('document.pdf');

   }else{

	   $notification = array(
		   'message' => 'Aucune correspondance',
		   'alert-type' => 'error'
	   );

	   return redirect()->back()->with($notification);
	  }

   
	   } 



}
 
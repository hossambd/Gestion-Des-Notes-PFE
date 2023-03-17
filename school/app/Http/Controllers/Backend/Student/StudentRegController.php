<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
//use App\Models\DiscountStudent;

use App\Models\Semestre;
use App\Models\Module;
use App\Models\Groupe;
use App\Models\Annee;
use App\Models\AssignModule;
use App\Models\AssignElement;
use DB;
use PDF;



class StudentRegController extends Controller
{
    public function StudentRegView(){
    	$data['annees'] = Annee::all();
    	$data['semestres'] = Semestre::all();

    	$data['annee_id'] = Annee::orderBy('id','desc')->first()->id;
    	$data['semestre_id'] = Semestre::orderBy('id','desc')->first()->id;
    	// dd($data['semestre_id']);
    	$data['allData'] = AssignStudent::where('annee_id',$data['annee_id'])->where('semestre_id',$data['semestre_id'])->get();
    	return view('backend.student.student_reg.student_view',$data);

    }


    public function StudentClassYearWise(Request $request){
    	$data['annees'] = Annee::all();
    	$data['semestres'] = Semestre::all();

    	$data['annee_id'] = $request->annee_id;
    	$data['semestre_id'] = $request->semestre_id;
    	 
    	$data['allData'] = AssignStudent::where('annee_id',$request->annee_id)->where('semestre_id',$request->semestre_id)->get()->unique('student_id');
    	return view('backend.student.student_reg.student_view',$data);

    } 


    public function StudentRegAdd(){
    	$data['annees'] = Annee::all();
    	$data['semestres'] = Semestre::all();
    	$data['groupes'] = Groupe::all();
    //	$data['modules'] = StudentModule::all();
    	return view('backend.student.student_reg.student_add',$data);
    }


    public function StudentRegStore(Request $request){
    	DB::transaction(function() use($request){
    	$checkYear = Annee::find($request->annee_id)->name;
    	$student = User::where('usertype','Student')->orderBy('id','DESC')->first();

    	if ($student == null) {
    		$firstReg = 0;
    		$studentId = $firstReg+1;
    		if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}
    	}else{
     $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
     	$studentId = $student+1;
     	if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}

    	} // end else 

    	$final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'Student';
    	$user->code = $code;
		$user->cne = $request->cne;
		$user->cin = $request->cin;

		$user->nomfr = $request->nomfr;
		$user->prenomfr = $request->prenomfr;
		$user->nomar = $request->nomar;
		$user->prenomar = $request->prenomar;
		$user->sessionBac = $request->sessionBac;
		$user->anneeBac = $request->anneeBac;
		$user->filiere = $request->filiere;
		$user->lieuN = $request->lieuN;

    	$user->mobile = $request->mobile;
    	$user->adress = $request->address;
    	
    
    	$user->dateN = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();
		 


          $element = AssignElement::where('semestre_id',$request->semestre_id)->get();
		 // dd(count($element);
		  
		  for($i=0;$i<count($element);$i++){
          $assign_student = new AssignStudent();
          $assign_student->student_id = $user->id;
          $assign_student->annee_id = $request->annee_id;
		  $assign_student->module_id = $element[$i]['module_id'];
		  $assign_student->element_id = $element[$i]['element_id'];

          $assign_student->semestre_id = $request->semestre_id;
          $assign_student->groupe_id = $request->groupe_id;
         // $assign_student->shift_id = $request->shift_id;
          $assign_student->save();
		  }
/*				
          $discount_student = new DiscountStudent();
          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';
          $discount_student->discount = $request->discount;
          $discount_student->save();
*/
    	});


    	$notification = array(
    		'message' => 'Registration etudiant bien inséré',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 


 
    public function StudentRegEdit($student_id){
    	$data['annees'] = Annee::all();
    	$data['semestres'] = Semestre::all();
    	$data['groupes'] = Groupe::all();
    //	$data['shifts'] = StudentShift::all();

    	$data['editData'] = AssignStudent::where('student_id',$student_id)->first();
    	// dd($data['editData']->toArray());
    	return view('backend.student.student_reg.student_edit',$data);

    }




 public function StudentRegUpdate(Request $request,$student_id){
    	DB::transaction(function() use($request,$student_id){
    	 

    	 
    	$user = User::where('id',$student_id)->first();    	 
    	
		$user->cne = $request->cne;
		$user->cin = $request->cin;
    
		$user->nomfr = $request->nomfr;
		$user->prenomfr = $request->prenomfr;
		$user->nomar = $request->nomar;
		$user->prenomar = $request->prenomar;
		$user->sessionBac = $request->sessionBac;
		$user->anneeBac = $request->anneeBac;
		$user->filiere = $request->filiere;
		$user->lieuN = $request->lieuN;

    	$user->mobile = $request->mobile;
    	$user->adress = $request->address;



    	
    	$user->dateN = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/student_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();



          $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
           
          $assign_student->annee_id = $request->annee_id;
          $assign_student->semestre_id = $request->semestre_id;
          $assign_student->groupe_id = $request->groupe_id;
        //  $assign_student->shift_id = $request->shift_id;
          $assign_student->save();
/*
          $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();
         
          $discount_student->discount = $request->discount;
          $discount_student->save();
*/
    	});


    	$notification = array(
    		'message' => 'Registration bien modifié',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 


    public function StudentRegPromotion($student_id){
    	$data['annees'] = Annee::all();
    	$data['semestres'] = Semestre::all();
    	$data['groupes'] = Groupe::all();
    	//$data['shifts'] = StudentShift::all();

    	$data['editData'] = AssignStudent::where('student_id',$student_id)->first();
    	 
    	return view('backend.student.student_reg.student_promotion',$data);

    }




 public function StudentUpdatePromotion(Request $request,$student_id){

	$StudentPromotion=AssignStudent::where('student_id',$student_id)->delete();
//dd($StudentPromotion);

    	DB::transaction(function() use($request,$student_id){
    	 

    	 
    	$user = User::where('id',$student_id)->first();    	 
    	
    	
		$user->cne = $request->cne;
		$user->cin = $request->cin;
		$user->nomfr = $request->name;
		$user->prenomfr = $request->prenomfr;
		$user->nomar = $request->nomar;
		$user->prenomar = $request->prenomar;
		$user->sessionBac = $request->sessionBac;
		$user->anneeBac = $request->anneeBac;
		$user->filiere = $request->filiere;
		$user->lieuN = $request->lieuN;

    	$user->mobile = $request->mobile;


    	$user->adress = $request->address;
    
    	$user->dateN = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/student_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

          $assign_student = new AssignStudent();
		  $element = AssignElement::where('semestre_id',$request->semestre_id)->get();
		  // dd(count($element);
		   
		   for($i=0;$i<count($element);$i++){
          $assign_student->student_id = $student_id;
          $assign_student->annee_id = $request->annee_id;
          $assign_student->semestre_id = $request->semestre_id;
		  $assign_student->module_id = $element[$i]['module_id'];
		  $assign_student->element_id = $element[$i]['element_id'];
          $assign_student->groupe_id = $request->groupe_id;
     //     $assign_student->shift_id = $request->shift_id;
          $assign_student->save();}
/*
          $discount_student = new DiscountStudent();

          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';
          $discount_student->discount = $request->discount;
          $discount_student->save();
*/
    	});


    	$notification = array(
    		'message' => 'Etudiant bien promoté ',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 



    public function StudentRegDetails($student_id){
     $data['details'] = AssignStudent::where('student_id',$student_id)->first();

    $pdf = PDF::loadView('backend.student.student_reg.student_details_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf'); 

    } 
  




} 

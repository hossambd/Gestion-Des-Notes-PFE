<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentTeacher;
use App\Models\User;
class StudentTeacherController extends Controller
{
    public function ViewStudent(){
		$data['allData'] = User::where('rule','enseignant')->get();
    	//$data['allData'] = StudentTeacher::all();
    	return view('backend.setup.student_teacher.view_teacher',$data);

    }


    /*public function StudentTeacherAdd(){
    	return view('backend.setup.student_teacher.add_teacher');
    }


    public function StudentTeacherStore(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_teachers,name',
    		
    	]);

    	$data = new StudentTeacher();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Ajout reussi',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.teacher.view')->with($notification);

    }



    public function StudentTeacherEdit($id){
    	$editData = StudentTeacher::find($id);
    	return view('backend.setup.student_teacher.edit_teacher',compact('editData'));

    }


    public function StudentTeacherUpdate(Request $request,$id){

		$data = StudentTeacher::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_teachers,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Mise à jour reussie',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.teacher.view')->with($notification);
    }


    public function StudentTeacherDelete($id){
    	$user = StudentTeacher::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Suppression effectuée',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('student.teacher.view')->with($notification);

    }


*/
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    public function student(){
    	return $this->belongsTo(User::class, 'student_id','id');
    }
 
 public function element(){
    	return $this->belongsTo(AssignElement::class, 'assign_subject_id','id');
    }
 public function annee(){
      return $this->belongsTo(Annee::class, 'annee_id','id');
   }
 public function semestre(){
    	return $this->belongsTo(Semestre::class, 'semestre_id','id');
    }

 public function module(){
    	return $this->belongsTo(AssignModule::class, 'module_id','id');
    }

 public function exam_type(){
    	return $this->belongsTo(ExamType::class, 'exam_type_id','id');
    }







}

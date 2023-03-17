<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTeacher extends Model
{
  public function student_teacher(){
   	return $this->belongsTo(User::class,'teacher_id','id');
   }

 public function school_subject(){
   	return $this->belongsTo(AssignElement::class,'element_id','id');
   }
  
  public function module(){
    return $this->belongsTo(Module::class,'module_id','id');
  }
  public function semestre(){
   return $this->belongsTo(Semestre::class,'semestre_id','id');
 }

public function element(){
    return $this->belongsTo(Element::class,'element_id','id');
  }


}

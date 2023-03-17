<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignElement extends Model
{
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

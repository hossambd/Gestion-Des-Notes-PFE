<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignModule extends Model
{
         public function semestre(){
   	return $this->belongsTo(Semestre::class,'semestre_id','id');
   }

 public function module(){
   	return $this->belongsTo(Module::class,'module_id','id');
   }
}

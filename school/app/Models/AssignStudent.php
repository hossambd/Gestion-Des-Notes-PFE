<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{ 
    public function student(){
    	return $this->belongsTo(User::class,'student_id','id');
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

 public function groupe(){
    	return $this->belongsTo(Groupe::class,'group_id','id');
    }


     public function annee(){
    	return $this->belongsTo(Annee::class,'annee_id','id');
    }


    



}

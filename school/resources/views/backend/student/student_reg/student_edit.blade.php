@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Modifier Etudiant </h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('update.student.registration',$editData->student_id) }}" enctype="multipart/form-data">
	 	@csrf
	 	<input type="hidden" name="id" value="{{ $editData->id }}">
					
		 <div class="row">
			<div class="col-12">	
<div class="row">
<div class="col-md-3">

	<div class="form-group">
  <h5>CNE <span class="text-danger">*</span></h5>
  <div class="controls">
<input type="text" name="cne" class="form-control" required="" value="{{ $editData['student']['cne'] }}" > 
</div>		 
</div>

	   </div> <!-- End Col md 4 -->
	   <div class="col-md-3">

		<div class="form-group">
	  <h5>CIN  <span class="text-danger">*</span></h5>
	  <div class="controls">
   <input type="text" name="cin" class="form-control" required="" value="{{ $editData['student']['cin'] }}"> 
	</div>		 
	</div>

		   </div> <!-- End Col md 4 -->

</div>


<div class="row"> <!-- 1st Row -->
 
 <div class="col-md-3">

<div class="form-group">
<h5>Nom  <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="nomfr" class="form-control" required="" value="{{ $editData['student']['nomfr'] }}"> 
</div>		 
</div>

 </div> <!-- End Col md 4 -->


<div class="col-md-3">

<div class="form-group">
<h5>Prenom <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="prenomfr" class="form-control" required="" value="{{ $editData['student']['prenomfr'] }}"> 
</div>		 
</div>

 </div> <!-- End Col md 4 -->



<div class="col-md-3">

<div class="form-group">
<h5>الاسم العائلي <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="nomar" class="form-control" required="" value="{{ $editData['student']['nomar'] }}"> 
</div>		 
</div>

 </div> <!-- End Col md 4 --> 

 
<div class="col-md-3">

<div class="form-group">
<h5>الاسم الشخصي <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="prenomar" class="form-control" required="" value="{{ $editData['student']['prenomar'] }}"> 
</div>		 
</div>

</div> <!-- End Col md 4 --> 

 
</div> <!-- End 1stRow -->






<div class="row"> <!-- 2nd Row -->
 
 <div class="col-md-3">

<div class="form-group">
<h5>Telephone <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="mobile" class="form-control"  value="{{ $editData['student']['mobile'] }}"> 
</div>		 
</div>

 </div> <!-- End Col md 4 -->


<div class="col-md-3">

<div class="form-group">
<h5>Adresse <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="address" class="form-control"  value="{{ $editData['student']['adress'] }}"> 
</div>		 
</div>

 </div> <!-- End Col md 4 -->



<div class="col-md-3">

<div class="form-group">
<h5>Date Naissance <span class="text-danger">*</span></h5>
<div class="controls">
<input type="date" name="dob" class="form-control"  value="{{ $editData['student']['dateN'] }}"> 
</div>		 
</div>

 </div> <!-- End Col md 4 --> 
 <div class="col-md-3">

	<div class="form-group">
		<h5>Lieu Naissance <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="lieuN" class="form-control"  value="{{ $editData['student']['lieuN'] }}"> 
	  </div>		 
	  </div>
  
		 </div> <!-- End Col md 4 --> 

 
</div> <!-- End 2nd Row -->



<div class="row"> <!-- 3rd Row -->


<div class="col-md-4">

<div class="form-group">
<h5>Session Bac <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="sessionBac" class="form-control"  value="{{ $editData['student']['sessionBac'] }}"> 
</div>		 
</div>

</div> <!-- End Col md 4 -->  



 
<div class="col-md-4">

<div class="form-group">
<h5>Annee Bac <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="anneeBac" class="form-control"  value="{{ $editData['student']['anneeBac'] }}"> 
</div>		 
</div>

 </div> <!-- End Col md 4 --> 


<div class="col-md-4">

<div class="form-group">
<h5>Filière <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="filiere" class="form-control"  value="{{ $editData['student']['filiere'] }}" > 
</div>		 
</div>

 </div> <!-- End Col md 4 --> 

 
</div> <!-- End 3rd Row -->






<div class="row"> <!-- 4TH Row -->


	<div class="col-md-4">
	
			  <div class="form-group">
			<h5>Année universitaire <span class="text-danger">*</span></h5>
			<div class="controls">
		 <select name="annee_id" required="" class="form-control">
				<option value="" selected="" disabled="">Choisir année</option>
				 @foreach($annees as $annee)
	 <option value="{{ $annee->id }}" {{ ($editData->annee_id == $annee->id)? "selected":"" }}  >{{ $annee->name }}</option>
				 @endforeach
				 
			</select>
		  </div>		 
		  </div>
		  
				 </div> <!-- End Col md 4 --> 
	
	
	
				 
			 <div class="col-md-4">
	
			  <div class="form-group">
			<h5>Semestre <span class="text-danger">*</span></h5>
			<div class="controls">
		 <select name="semestre_id"  required="" class="form-control">
				<option value="" selected="" disabled="">Choisir semestre</option>
				 @foreach($semestres as $semestre)
				<option value="{{ $semestre->id }}" {{ ($editData->semestre_id == $semestre->id)? "selected":"" }} >{{ $semestre->name }}</option>
				 @endforeach
				 
			</select>
		  </div>		 
		  </div>
		  
				 </div> <!-- End Col md 4 --> 
	
	
	<div class="col-md-4">
	
			  <div class="form-group">
			<h5>Groupe <span class="text-danger">*</span></h5>
			<div class="controls">
		 <select name="groupe_id"   required="" class="form-control">
				<option value="" selected="" disabled="">Choisir groupe</option>
				 @foreach($groupes as $groupe)
				<option value="{{ $groupe->id }}" {{ ($editData->groupe_id == $groupe->id)? "selected":"" }} >{{ $groupe->name }}</option>
				 @endforeach
				 
			</select>
		  </div>		 
		  </div>
		  
				 </div> <!-- End Col md 4 --> 
	 
				 
			 </div> <!-- End 4TH Row -->
	
	



<div class="row"> <!-- 5TH Row -->


<div class="col-md-4">



 </div> <!-- End Col md 4 --> 



 
<div class="col-md-4">

<div class="form-group">
<h5>Profile Image <span class="text-danger">*</span></h5>
<div class="controls">
<input type="file" name="image" class="form-control" id="image" >  </div>
</div>

 </div> <!-- End Col md 4 --> 


<div class="col-md-4">

<div class="form-group">
<div class="controls">
<img id="showImage" src="{{ (!empty($editData['student']['image']))? url('upload/student_images/'.$editData['student']['image']):url('upload/user-icon.png') }}" style="width: 100px; width: 100px; border: 1px solid #000000;"> 

</div>
</div>

 </div> <!-- End Col md 4 --> 

 
</div> <!-- End 5TH Row -->



				 
			<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-info mb-5" value="Mettre à jour">
			</div>
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
	
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>


 
 
	  
	  </div>
  </div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>



@endsection

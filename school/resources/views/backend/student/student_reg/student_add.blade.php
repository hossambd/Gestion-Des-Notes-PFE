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
			  <h4 class="box-title">Ajouter étudiant </h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('store.student.registration') }}" enctype="multipart/form-data">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
		<div class="row">
			<div class="col-md-3">

				<div class="form-group">
			  <h5>CNE <span class="text-danger">*</span></h5>
			  <div class="controls">
		   <input type="text" name="cne" class="form-control" required="" > 
			</div>		 
			</div>
	  
				   </div> <!-- End Col md 4 -->
				   <div class="col-md-3">

					<div class="form-group">
				  <h5>CIN  <span class="text-danger">*</span></h5>
				  <div class="controls">
			   <input type="text" name="cin" class="form-control" required="" > 
				</div>		 
				</div>
		  
					   </div> <!-- End Col md 4 -->

		</div>

 	
 		<div class="row"> <!-- 1st Row -->
 			
 			<div class="col-md-3">

 		 <div class="form-group">
		<h5>Nom  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="nomfr" class="form-control" required="" > 
	  </div>		 
	  </div>

 			</div> <!-- End Col md 4 -->


	<div class="col-md-3">

 		 <div class="form-group">
		<h5>Prenom <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="prenomfr" class="form-control" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 -->



	<div class="col-md-3">

 		 <div class="form-group">
		<h5>الاسم العائلي <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="nomar" class="form-control" required=""> 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 

			 
	<div class="col-md-3">

		<div class="form-group">
	  <h5>الاسم الشخصي <span class="text-danger">*</span></h5>
	  <div class="controls">
   <input type="text" name="prenomar" class="form-control" required=""> 
	</div>		 
	</div>
	
		   </div> <!-- End Col md 4 --> 
 
 			
 		</div> <!-- End 1stRow -->






	<div class="row"> <!-- 2nd Row -->
 			
 			<div class="col-md-3">

 		 <div class="form-group">
		<h5>Telephone <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="mobile" class="form-control" required="" > 
	  </div>		 
	  </div>

 			</div> <!-- End Col md 4 -->


	<div class="col-md-3">

 		 <div class="form-group">
		<h5>Address <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="address" class="form-control" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 -->



	<div class="col-md-3">

		<div class="form-group">
			<h5>Date Naissance <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="date" name="dob" class="form-control" required="" > 
		  </div>		 
		  </div>
	  
 			</div> <!-- End Col md 4 --> 
			 <div class="col-md-3">

				<div class="form-group">
					<h5>Lieu Naissance <span class="text-danger">*</span></h5>
					<div class="controls">
				 <input type="text" name="lieuN" class="form-control" required="" > 
				  </div>		 
				  </div>
			  
					 </div> <!-- End Col md 4 --> 
 
 			
 		</div> <!-- End 2nd Row -->



<div class="row"> <!-- 3rd Row -->


	<div class="col-md-4">

		<div class="form-group">
			<h5>Session Bac <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="text" name="sessionBac" class="form-control" required="" > 
		  </div>		 
	    </div>
	  
	</div> <!-- End Col md 4 -->  



 			
	<div class="col-md-4">

		<div class="form-group">
			<h5>Annee Bac <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="text" name="anneeBac" class="form-control" required="" > 
		  </div>		 
		  </div>
	  
			 </div> <!-- End Col md 4 --> 


	<div class="col-md-4">

		<div class="form-group">
			<h5>Filière <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="text" name="filiere" class="form-control" required="" > 
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
			<option value="{{ $annee->id }}">{{ $annee->name }}</option>
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
			<option value="" selected="" disabled="">Choisir semestre </option>
			 @foreach($semestres as $semestre)
			<option value="{{ $semestre->id }}">{{ $semestre->name }}</option>
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
			<option value="" selected="" disabled="">Choisir Groupe</option>
			 @foreach($groupes as $groupe)
			<option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
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
	<img id="showImage" src="{{ url('upload/user-icon.png') }}" style="width: 100px; width: 100px; border: 1px solid #000000;"> 

	 </div>
	 </div>
	  
 			</div> <!-- End Col md 4 --> 
 
 			
 		</div> <!-- End 5TH Row -->

 
  
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Ajouter">
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

@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">

		
<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Gestion <strong>Relevé des notes</strong></h4>
				  </div>

				  <div class="box-body">
				
 <form method="GET" action="{{ route('report.marksheet.get') }}" target="_blank">
			@csrf
			<div class="row">



<div class="col-md-3">

 		 <div class="form-group">
		<h5>Année universitaire <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="annee_id" id="semestre_id" required="" class="form-control">
			<option value="" selected="" disabled="">Choisir Année</option>
			 @foreach($annees as $annee)
 <option value="{{ $annee->id }}" >{{ $annee->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 



 			
 		<div class="col-md-3">

 		 <div class="form-group">
		<h5>Semestre <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="semestre_id" id="semestre_id"  required="" class="form-control">
			<option value="" selected="" disabled="">Choisir Semestre</option>
			 @foreach($semestres as $semestre)
			<option value="{{ $semestre->id }}">{{ $semestre->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 


 		


<div class="col-md-3">

 		 <div class="form-group">
		<h5>Type examen <span class="text-danger"> </span></h5>
		<div class="controls">
 <select name="exam_type_id" id="exam_type_id"  required="" class="form-control">
			<option value="" selected="" disabled="">Choisir type examen</option>
			 @foreach($exam_type as $exam)
			<option value="{{ $exam->id }}">{{ $exam->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 



 <div class="col-md-3">

 		 <div class="form-group">
		<h5>CNE <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="cne" class="form-control" required="" > 
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 			





 			<div class="col-md-3"  >

  <input type="submit" class="btn btn-rounded btn-primary" value="Chercher">
  <input type="submit" class="btn btn-rounded btn-primary" value="Imprimer" formaction="{{url('reports/marksheet/generate/details')}}">


	  
 			</div> <!-- End Col md 3 --> 		
			</div><!--  end row --> 

 

		</form> 

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>

 

 


@endsection

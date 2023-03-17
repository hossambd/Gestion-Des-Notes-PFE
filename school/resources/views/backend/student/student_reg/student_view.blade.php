@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		
<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Chercher <strong>Etudiant</strong></h4>
				  </div>

				  <div class="box-body">
				
		<form method="GET" action="{{ route('student.year.class.wise') }}">
			
			<div class="row">

<div class="col-md-4">

 		 <div class="form-group">
		<h5>Année universitaire <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="annee_id" required="" class="form-control">
			<option value="" selected="" disabled="">Choisir année </option>
			 @foreach($annees as $annee)
 <option value="{{ $annee->id }}" >{{ $annee->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 

<div class="col-md-4">

 		 <div class="form-group">
		<h5>Semestre <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="semestre_id" required="" class="form-control">
			<option value="" selected="" disabled="">Choisir Semestre </option>
			 @foreach($semestres as $semestre)
 <option value="{{ $semestre->id }}" >{{ $semestre->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 





 			<div class="col-md-4" style="padding-top: 25px;">

 <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Chercher">
	  
 			</div> <!-- End Col md 4 --> 

 

				
			</div><!--  end row --> 

		</form>
 
					 
				  </div>
				</div>
	</div> <!-- // end first col 12 -->


			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Liste des étudiants</h3>
	<a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Ajouter etudiant  </a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">

	@if(!@search)					
	 <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">ID</th>  
				<th>Nom complet</th>
				<th>CNE</th>
				<th>Semestre</th>
				<th>CIN</th>
				<th>Image</th>
				
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $value['student']['id'] }}</td>
				<td> {{ $value['student']['nomfr'].$value['student']['prenomfr'] }}</td>
				<td> {{ $value['student']['cne'] }}</td>	
				<td> {{ $value['semestre']['name'] }}</td>	
				<td>  {{ $value['student']['cin'] }}</td>	
				<td>
	 <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/user-icon.png') }}" style="width: 60px; width: 60px;"> 
				</td>	
							 
				<td>
<a title="Edit" href="{{ route('student.registration.edit',$value->student_id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>

<a title="Promotion" href="{{ route('student.registration.promotion',$value->student_id) }}" class="btn btn-primary" ><i class="fa fa-check"></i></a>

<a target="_blank" title="Details" href="{{ route('student.registration.details',$value->student_id) }}" class="btn btn-danger"  ><i class="fa fa-eye"></i></a>

				</td>
				 
			</tr>
			@endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>

			@else

	  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">CNE</th>  
				<th>Non complet</th>
				<th>CNE</th>
				<th>Semestre</th>
				<th>CIN</th>
				<th>Image</th>
			
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $value['student']['id'] }}</td>
				<td> {{ $value['student']['nomfr']." ".$value['student']['prenomfr'] }}</td>
				<td> {{ $value['student']['cne'] }}</td>	
				<td> {{ $value['semestre']['name'] }}</td>	
				<td>  {{ $value['student']['cin'] }}</td>	
				<td>
	 <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/user-icon.png') }}" style="width: 60px; width: 60px;"> 
				</td>	
							 
				<td>
<a title="Edit" href="{{ route('student.registration.edit',$value->student_id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>

<a title="Promotion" href="{{ route('student.registration.promotion',$value->student_id) }}" class="btn btn-primary" ><i class="fa fa-check"></i></a>

<a target="_blank" title="Details" href="{{ route('student.registration.details',$value->student_id) }}" class="btn btn-danger"  ><i class="fa fa-eye"></i></a>

				</td>
				 
			</tr>
			@endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>


			@endif



					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection

@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms --> 
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Mise à jour utilisateur</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('users.update',$editData->id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	


<div class="row">
	<div class="col-md-6" >

		<div class="form-group">
	<h5>Type Utilisateur <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="rule"  required="" class="form-control">
			<option value="" selected="" disabled="">Choisir type</option>
 <option value="admin" {{ ($editData->rule == "admin" ? "selected": "") }}  >Admin</option>
 <option value="enseignant" {{ ($editData->rule == "enseignant" ? "selected": "") }} >Enseignant</option>
			 
		</select>
	 </div>
          </div>
	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >		
	<div class="form-group">
		<h5>Nom <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" value="{{ $editData->nomfr }}" required="">  </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->



    <div class="row">
	<div class="col-md-6" >

		<div class="form-group">
		<h5>Email <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control" value="{{ $editData->email }}" required="">  </div>
		 
	</div>

	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >
		
 

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->

 
  
							 
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





@endsection

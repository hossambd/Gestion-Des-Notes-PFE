@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Ajouter utilisateur</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('users.store') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	


<div class="row">
	<div class="col-md-6" >

		<div class="form-group">
	<h5>Type utilisateur <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="rule" id="rule" required="" class="form-control">
			<option value="" selected="" disabled="">Choisir type</option>
			<option value="admin">Admin</option>
			<option value="enseignant">Enseignant</option>
			 
		</select>
	 </div>
          </div>
	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >		
	<div class="form-group">
		<h5>Nom <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" required="">  </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->



    <div class="row">
	<div class="col-md-6" >

		<div class="form-group">
		<h5>Email <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control" required="">  </div>
		 
	</div>

	</div> <!-- End Col Md-6 -->

		<div class="col-md-6" >

	<!-- End Col Md-6 -->
			<div class="form-group">
		<h5>Téléphone <span class="text-danger">(optionnel)</span></h5>
		<div class="controls">
	 <input type="text" name="mobile" class="form-control" >  
	 </div>
		 
	</div>

</div> <!-- End Row -->

 
  
							 
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





@endsection

@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">matière à enseigner</h3>
	<a href="{{ route('assign.teacher.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Ajouter matière assignée</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Enseigants</th> 
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $assign )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $assign['student_teacher']['nomfr'].' '.$assign['student_teacher']['prenomfr'] }}</td>				 
				<td>
<a href="{{ route('assign.teacher.edit',$assign->teacher_id ) }}" class="btn btn-info">Modifier</a>
<a href="{{ route('assign.teacher.details',$assign->teacher_id ) }}" class="btn btn-primary" >Details</a>

				</td>
				 
			</tr>
			@endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>
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

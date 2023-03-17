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
				  <h3 class="box-title">Liste des étudiants</h3>

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
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $value['student']['id'] }}</td>
				<td> {{ $value['student']['nomfr'].$value['student']['prenomfr'] }}</td>
				<td> {{ $value['student']['cne'] }}</td>		
				
				 
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

				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $value['student']['id'] }}</td>
				<td> {{ $value['student']['nomfr']." ".$value['student']['prenomfr'] }}</td>
				<td> {{ $value['student']['cne'] }}</td>		
				 
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

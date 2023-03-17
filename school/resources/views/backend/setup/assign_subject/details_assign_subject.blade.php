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
				  <h3 class="box-title"> Details element assignée</h3>
	<a href="{{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Ajouter element assignée</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">

<h4><strong>Element assignée dans : </strong>{{ $detailsData['0']['module']['name'] }} </h4>					
					<div class="table-responsive">
					  <table class="table table-bordered table-striped">
						<thead class="thead-light">
			<tr>
				<th width="5%">SL</th>  
				<th width="20%">Element</th> 
				<th width="20%">Note sur</th>
				<th width="20%">Validation</th>
				<th width="20%">Compensation</th>
				<th width="10%">Coef Mark</th> 
			</tr>
		</thead>
		<tbody>
			@foreach($detailsData as $key => $detail )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $detail['element']['name'] }}</td>				 
				<td> {{ $detail->full_mark }}</td>
				<td> {{ $detail->pass_mark }}</td>
				<td> {{ $detail->subjective_mark }}</td>
				<td> {{ $detail->coef_mark }}</td> 
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

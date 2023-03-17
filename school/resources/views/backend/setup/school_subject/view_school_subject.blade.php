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
				  <h3 class="box-title">Liste des matières</h3>
	<a href="{{ route('school.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Ajouter matière</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Libelle</th> 
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $subject )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $subject->name }}</td>				 
				<td>
<a href="{{ route('school.subject.edit',$subject->id) }}" class="btn btn-info">Modifier</a>
<a href="{{ route('school.subject.delete',$subject->id) }}" class="btn btn-danger" id="delete">Supprimer</a>

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

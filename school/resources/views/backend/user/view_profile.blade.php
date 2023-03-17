@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 
			<div class="col-12">
        
				<div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" >
					  <h3 class="widget-user-username">Nom : {{$user->nomfr}}</h3>
					  <a href="{{ route('profile.edit')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
					  <h6 class="widget-user-desc">Type : {{$user->usertype}}</h6>
					  <h6 class="widget-user-desc">Email : {{$user->email}}</h6>
				   
	
	
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{(!empty($user->image)) ? url('upload/user_images/'.$user->image) : url('upload/user-icon.png')}}" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Telephone</h5>
							<span class="description-text">{{$user->mobile}}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Addresse</h5>
							<span class="description-text">{{$user->adress}}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">CIN</h5>
							<span class="description-text">{{$user->cin}}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
	
			  </div>



			<!-- /.col -->
		  </div>
		  <!-- /.row -->
@if(Auth::user()->rule == 'enseignant')	
	<div id= "rowstudents" class="row">
			  
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Liste des matières enseignées</h3>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
<form method="GET" action="{{ route('profile.student.year.class.wise') }}">

					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>
				<th style="display:none">Annee</th>
				<th>Semestre</th>
				
				<th>Élement</th>				
				<th width="20%">Voir</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($detailsData as $key => $detail )
			<?php 
                  $name= App\Models\Element::select('name')->where('id',$detail['element_id'])->get();
			?>
			<tr>		
				<td id="">{{ $key+1 }}</td>
				<td style="display:none"><input type="text"  name="annee_id"value="{{ $detail['annee_id'] }}">{{ $detail['annee_id'] }}</td>
				<td ><input type="text" style="display:none" name="semestre_id"value="{{ $detail['semestre_id'] }}">{{ $detail['semestre_id'] }}</td>
				<td ><input type="text" style="display:none" name="element_id"value="{{ $detail['element_id'] }}"> {{ $name[0]['name'] }}</td>				 

				 
			
			 
				<td class="text-center">
<input type="submit" style="background-color: #7a15f7;border-color: #7a15f7;color: #ffffff;" class="btn btn-info" name="search" value="Étudiants">
				</td>
				 
			</tr>
			@endforeach		
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>
					  </form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
		</section>
		<!-- /.content -->
	  
	  </div>
@endif  
	  </div>
  </div>
  <script type="text/javascript">
  $(document).on('click','#search',function(){
 //   var semestre_id = $('#semestre_id').val();
   // var module_id = $('#module_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'semestre_id':semestre_id,'module_id':module_id,'assign_subject_id':assign_subject_id,'exam_type_id':exam_type_id},
      success: function (data) {
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="marks[]" value=" '+v.marks +' " ></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });

</script>
@endsection

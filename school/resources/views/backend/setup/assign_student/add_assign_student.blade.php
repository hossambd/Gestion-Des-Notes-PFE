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
					<h4 class="box-title">Inscription  <strong>des matières</strong></h4>
				  </div>

				  <div class="box-body">
				
		<form method="post" action="{{ route('store.assign.student') }}">
			@csrf
			<div class="row">


<div class="col-md-5">

 		 <div class="form-group">
		<h5>ID No <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="id_no" id="id_no"  class="form-control" required="" > 
	  </div>
	  	<div class="col-md-3"  >

  <a id="search" class="btn btn-primary" name="search"> Chercher</a>
	  
 			</div> <!-- End Col md 3 --> 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 			

 				
			</div><!--  end row --> 

 <!--  ////////////////// Assign student table /////////////  -->
 
 <div class="row d-none" id="marks-entry">
 	<div class="col-md-12">
 		<table class="table table-bordered table-striped" style="width: 100%">
 			<thead>
 				<tr>
 					<th>ID No</th>
 					<th>Nom  </th>
 					<th>Semestre </th>
 					<th>Module</th>
 					<th>Element</th>
					<th>Action</th>
 				 </tr> 				
 			</thead>
 			<tbody id="marks-entry-tr">
 				
 			</tbody>
 			
 		</table>
 <input type="submit" class="btn btn-rounded btn-primary" value="Ajouter">

 	</div>
 	
 </div>
 

		</form> 

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>


<script type="text/javascript">
  $(document).on('click','#search',function(){
    var semestre_id = $('#semestre_id').val();
    var module_id = $('#module_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
	var id_no=$('#id_no').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'semestre_id':semestre_id,'module_id':module_id},
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
          '<td><input type="text" class="form-control form-control-sm" name="marks[]" ></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });

</script>


<!--   // for get Student Subject  -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#module_id',function(){
      var module_id = $('#module_id').val();
      $.ajax({
        url:"{{ route('marks.getsubject') }}",
        type:"GET",
        data:{module_id:module_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    });
  });
</script>



@endsection
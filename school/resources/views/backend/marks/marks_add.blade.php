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
					<h4 class="box-title">Liste <strong>des notes</strong></h4>
				  </div>

				  <div class="box-body">
				
		<form method="post" action="{{ route('marks.entry.store') }}">
			@csrf
			<div class="row">



<div class="col-md-3">

 		 <div class="form-group">
		<h5>Annee universitaire <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="annee_id" id="annee_id" required="" class="form-control">
			<option value="" selected="" disabled="">Choisir année</option>
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
		<h5>Element <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="assign_subject_id" id="assign_subject_id"  required="" class="form-control">
			<option  selected="" >Choisir élément</option>
			  
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 


<div class="col-md-3">

 		 <div class="form-group">
		<h5>Session examen <span class="text-danger"> </span></h5>
		<div class="controls">
 <select name="exam_type_id" id="exam_type_id"  required="" class="form-control">
			<option value="" selected="" disabled="">Choisir type</option>
			 @foreach($exam_types as $exam)
			<option value="{{ $exam->id }}">{{ $exam->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 





 			<div class="col-md-3"  >

  <a id="search" class="btn btn-primary" name="search"> Chercher</a>
	  
 			</div> <!-- End Col md 3 --> 		
			</div><!--  end row --> 


 <!--  ////////////////// Mark Entry table /////////////  -->


 <div class="row d-none" id="marks-entry">
 	<div class="col-md-12">
 		<table class="table table-bordered table-striped" style="width: 100%">
 			<thead>
 				<tr>
 					<th>ID</th>
					 <th>CNE</th>
					 <th>Nom & Prénom</th>
 					<th>Module</th>
 					<th>Element</th>
 					<th>Notes</th>
 				 </tr> 				
 			</thead>
 			<tbody id="marks-entry-tr">
 				
 			</tbody>
 			
 		</table>
 <input type="submit" class="btn btn-rounded btn-primary" value="Ajouter">

 	</div>
 	
 </div>
 

		</form> 

			       <!-- Modal -->

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
	var annee_id = $('#annee_id').val();
    var semestre_id = $('#semestre_id').val();
    //var module_id = $('#module_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
	var assign_subject_name = $('#assign_subject_id option:selected').text();
    var exam_type_id = $('#exam_type_id').val();
	console.log(exam_type_id);
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'annee_id':annee_id,'semestre_id':semestre_id,'assign_subject_id':assign_subject_id,'exam_type_id':exam_type_id},
      success:function (data) { 
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html += 
          '<tr>'+
          '<td>'+v.student.id+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
		  '<td>'+ v.student.cne +'<input type="hidden" name="cne[]" value="'+v.student.cne+'"> </td>'+
          '<td>'+v.student.nomfr+' '+v.student.prenomfr+'</td>'+
          '<td>'+v.module_id +'<input type="hidden" name="module_id" value="'+v.module_id+'"></td>'+
          '<td>'+assign_subject_name+'</td>'+
          '<td> <input type="text" class="form-control form-control-sm" name="marks[]" ></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      },
	  error:function(data){
		$('#marks-entry').removeClass('d-none');
        var html = '';
          html += 
          '<tr>'+
         
		  '<td colspan=6 >L\'insertion est déja fait , vous pouvez modifier la note </td>'+
          
          '</tr>';
        
        html = $('#marks-entry-tr').html(html);
	  }
    });
  });

</script>

<!--   // for get Student class  -->
<!--
<script type="text/javascript">
  $(function(){
    $(document).on('change','#semestre_id',function(){
      var semestre_id = $('#semestre_id').val();
      $.ajax({
        url:"{{ route('marks.getclass') }}",
        type:"GET",
        data:{semestre_id:semestre_id},
        success:function(data){
         		$('#module_id').html('oui');
           var html = '<option value="">Choisir module</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.school_class.name+'</option>';
          });
          $('#module_id').html(html);
        }
      });
    });
  });
</script>-->
<!--   // for get Student Subject with semestre  -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#semestre_id',function(){
      var semestre_id = $('#semestre_id').val();
      $.ajax({
        url:"{{ route('marks.getsubject') }}",
        type:"GET",
        data:{semestre_id:semestre_id},
        success:function(data){
          var html = '<option value="">Choisir élément</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.element.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    });
  });
</script>



@endsection

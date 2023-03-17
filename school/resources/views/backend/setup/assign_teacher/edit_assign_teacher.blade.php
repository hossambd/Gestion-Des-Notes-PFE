@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Modifier matière assignée</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

 <form method="post" action="{{ route('update.assign.teacher',$editData[0]->teacher_id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">
						<div class="add_item">
							<div class="row">
     	<div class="col-md-4">

   <div class="form-group">
	<h5>Année Universitaire <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="annee_id" required="" class="form-control">
		<option value="" selected="" disabled="">Choisir année</option>
		@foreach($annees as $annee)
		<option value="{{ $annee->id }}" {{ ($editData['0']['annee_id'] == $annee->id) ? "selected": ""  }} > {{ $annee->name }}</option>
		@endforeach	 
		</select>
	 </div>
          </div> 
		  </div>
		  </div>
						 

 	<div class="form-group">
	<h5>Nom Enseignant <span class="text-danger">*</span></h5>
	<div class="controls">
	 <input type ="text" name="teacher_id"  disabled class="form-control"
	 value ="{{ $editData['0']['student_teacher']['nomfr'].' '.$editData['0']['student_teacher']['prenomfr'] }} ">
	 </div>
          </div> <!-- // end form group -->


@foreach($editData as $edit)
  <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
        <div class="row">
		<div class="col-md-4">
 
 <div class="form-group">
  <h5>Nom Semestre <span class="text-danger">*</span></h5>
  <div class="controls">
   <select name="semestre_id[]" required="" class="form-control">
	  <option value="" selected="" disabled="">Choisir semestre</option>
	  @foreach($semestres as $semestre)
	  <option value="{{ $semestre->id }}" {{ ($edit->semestre_id == $semestre->id)? "selected": ""  }}>{{ $semestre->name }}</option>
	  @endforeach	 
	  </select>
   </div>
		</div> <!-- // end form group -->
	   </div> <!-- End col-md-5 -->

     	<div class="col-md-4">

   <div class="form-group">
	<h5>Nom matière <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="element_id[]" required="" class="form-control">
		<option value="" selected="" disabled="">Choisir matière</option>
		@foreach($subjects as $subject)
		<option value="{{ $subject->id }}" {{ ($edit->element_id == $subject->id)? "selected": ""  }}>{{ $subject->name }}</option>
		@endforeach	 
		</select>
	 </div>
          </div> <!-- // end form group -->
     	</div> <!-- End col-md-5 -->



     	<div class="col-md-2" style="padding-top: 25px;">
 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span> <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span> 
     	</div><!-- End col-md-5 -->
     	
     </div> <!-- end Row -->
     </div><!-- // End Remove Delete  -->
 @endforeach




 </div>	<!-- // End add_item -->
							 
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


  <div style="visibility: hidden;">
  	<div class="whole_extra_item_add" id="whole_extra_item_add">
  		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
  			<div class="form-row">
			  <div class="col-md-4">
 
 <div class="form-group">
  <h5>Nom Semestre <span class="text-danger">*</span></h5>
  <div class="controls">
   <select name="semestre_id[]" required="" class="form-control">
	  <option value="" selected="" disabled="">Choisir semestre</option>
	  @foreach($semestres as $semestre)
	  <option value="{{ $semestre->id }}" {{ ($edit->semestre_id == $semestre->id)? "selected": ""  }}>{{ $semestre->name }}</option>
	  @endforeach	 
	  </select>
   </div>
		</div> <!-- // end form group -->
	   </div> <!-- End col-md-5 -->

	 <div class="col-md-4">

   <div class="form-group">
	<h5>Student Subject <span class="text-danger">*</span></h5>
	<div class="controls">
	 <select name="element_id[]" required="" class="form-control">
		<option value="" selected="" disabled="">Select Subject</option>
		@foreach($subjects as $subject)
		<option value="{{ $subject->id }}">{{ $subject->name }}</option>
		@endforeach	 
		</select>
	 </div>
          </div> <!-- // end form group -->
     	</div> <!-- End col-md-5 -->


     	<div class="col-md-2" style="padding-top: 25px;">
 <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
  <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>    		
     	</div><!-- End col-md-2 -->
     	


  				
  			</div>  			
  		</div>  		
  	</div>  	
  </div>


 <script type="text/javascript">
 	$(document).ready(function(){
 		var counter = 0;
 		$(document).on("click",".addeventmore",function(){
 			var whole_extra_item_add = $('#whole_extra_item_add').html();
 			$(this).closest(".add_item").append(whole_extra_item_add);
 			counter++;
 		});
 		$(document).on("click",'.removeeventmore',function(event){
 			$(this).closest(".delete_whole_extra_item_add").remove();
 			counter -= 1
 		});

 	});
 </script>


@endsection

 @php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();

 @endphp
<script>
$(document).ready(function() {
    var itemContainer1 = $(".sidebar");
    itemContainer1.slimScroll({
        height: '200px',
		width : '10px' ,
        start: 'bottom',
		color: '#c3c3c3',
        alwaysVisible: true
    });
</script>

 <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
			
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">	
<img alt="ENA Logo" title="ENA Logo" style="border-radius:50%;" src="{{asset('backend/images/logoena50x50.png')}}" />					 
						  <h3><b>ENA</b> Agadir</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard')?'active':'' }}" >
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Tableau de board</span>
          </a>
        </li>  
		
    @if(Auth::user()->rule == 'admin')
        <li class="treeview {{ ($prefix == '/users')?'active':'' }} " >
          <a href="#">
            <i data-feather="message-circle"></i>
            <span >Gestion Utilisateur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>Voir Utilisateur</a></li>
            <li><a href="{{ route('users.add') }}"><i class="ti-more"></i>Ajouter Utilisateur</a></li>
          </ul>
        </li> 
        @endif
		  
        <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
          <a href="#">
            <i data-feather="grid"></i> <span>Gestion Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Mon Profile</a></li>
        <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Changer mot de passe</a></li>
            
          </ul>
        </li>


@if(Auth::user()->rule == 'admin')
<li class="treeview {{ ($prefix == '/setups')?'active':'' }}">
          <a href="#">
            <i data-feather="credit-card"></i> <span>Gestion d'administration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
	   <?php /*	<li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Voir Semestres</a></li>
        <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Voir Modules</a></li>
         <li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Voir Type d'examen</a></li> 
		 <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Voir Élements</a>
		 </li><li><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Voir Groupe étudiant</a></li> */ ?>
     		 <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Voir Élements</a>
         <li><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Voir Année universitaire</a></li>
         <li hidden="hidden"><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a></li>
        <li hidden="hidden"><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a></li>
         <li><a href="{{ route('student.teacher.view') }}"><i class="ti-more"></i>Listes des Professeurs</a></li>
		 <li hidden="hidden"><a href="{{ route('assign.class.view') }}"><i class="ti-more"></i>Modules pour Semestres</a></li>
         <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Élements pour Modules</a></li>
		 <li><a href="{{ route('assign.teacher.view') }}"><i class="ti-more"></i>Élements pour Professeurs</a></li>
		  <li hidden="hidden"><a href="{{ route('assign.student.view') }}"><i class="ti-more"></i>Élements pour Étudiants</a></li>
         <li hidden="hidden"><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation </a></li>
         
            
          </ul>
        </li>


<li class="treeview {{ ($prefix == '/students')?'active':'' }}" >
          <a href="#">
             <i data-feather="hard-drive"></i></i> <span>Gestion des Étudiants</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Inscription </a></li>

        <li hidden="hidden"><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a></li>
        <li hidden="hidden"><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration Fee </a></li>
         <li hidden="hidden"><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthly Fee </a></li>
         <li hidden="hidden"><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Exam Fee </a></li>
             
          </ul>
        </li>
@endif

<li hidden="hidden" class="treeview {{ ($prefix == '/employees')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i> <span>Gestion Enseignant </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li  class="{{ ($route == 'employee.registration.view')?'active':'' }}"><a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Enseignant Registration</a></li>

         <li  class="{{ ($route == 'employee.salary.view')?'active':'' }}"><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>

         <li><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a></li>
         <li><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee Attendance</a></li>
          <li><a href="{{ route('employee.monthly.salary') }}"><i class="ti-more"></i>Employee Monthly Salary</a></li>
 
            
          </ul>
        </li>



<li class="treeview {{ ($prefix == '/marks')?'active':'' }}">
          <a href="#">
             <i data-feather="edit-2"></i> <span> Gestion des notes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'marks.entry.add')?'active':'' }}"><a href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Insertion des notes</a></li> 
      <li class="{{ ($route == 'marks.entry.edit')?'active':'' }}"><a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Modification des notes</a></li>

       <li hidden="hidden" class="{{ ($route == 'marks.entry.grade')?'active':'' }}"><a href="{{ route('marks.entry.grade') }}"><i class="ti-more"></i>Mention des notes</a></li> 

            
          </ul>
        </li>





<li class="treeview {{ ($prefix == '/accounts')?'active':'' }}" hidden="hidden">
          <a href="#">
            <i data-feather="inbox"></i> <span> Accounts Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'student.fee.view')?'active':'' }}"><a href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Student Fee</a></li> 
        <li class="{{ ($route == 'account.salary.view')?'active':'' }}"><a href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li> 

        <li class="{{ ($route == 'other.cost.view')?'active':'' }}"><a href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Other Cost</a></li>

            
          </ul>
        </li>

		
      
@if(Auth::user()->rule == 'admin')

        <li class="header nav-small-cap">Interface Impression</li>
		  
       <li class="treeview {{ ($prefix == '/reports')?'active':'' }}">
          <a href="#">
            <i data-feather="server"></i></i> <span> Gestion des relevés</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="{{ ($route == 'marksheet.generate.view')?'active':'' }}"><a href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>Relevé des notes</a></li>

           <li class="{{ ($route == 'student.result.view')?'active':'' }}"><a href="{{ route('student.result.view') }}"><i class="ti-more"></i>PV de classe </a></li>

      
          </ul>
        </li>
@endif		
		 
		  
		 
        
      </ul>
    </section>
	
	<!--<div class="sidebar-footer">
	<!--	<!-- item-->
	<!--	<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
	<!--	<!-- item-->
	<!--	<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
	<!--	<!-- item-->
	<!--	<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>-->
  </aside>
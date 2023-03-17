@extends('admin.admin_master')
@section('admin')

<?php 

$nbr_etudiant = App\Models\User::where('usertype','Student')->get()->count();
$nbr_admin = App\Models\User::where('usertype','admin')->get()->count();
$nbr_ens = App\Models\User::where('usertype','enseignant')->get()->count();


?>


<div class="content-wrapper">
	
	<div class="container-full">
		
			
			<div class="box-body" style="text-align: center">


				<div id="carousel-example-generic-Indicators" class="carousel slide" data-ride="carousel" data-interval="3000"> 
					<!-- Indicators -->
						<ol class="carousel-indicators">
						  <li data-target="#carousel-example-generic-Indicators" data-slide-to="0" class="active"></li>
						  <li data-target="#carousel-example-generic-Indicators" data-slide-to="1"></li>
						  <li data-target="#carousel-example-generic-Indicators" data-slide-to="2"></li>
						  <li data-target="#carousel-example-generic-Indicators" data-slide-to="3"></li>

						</ol>                 
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox" style="height:300px">
					  <div class="carousel-item active">
						<img src="{{asset('upload/ens.jpg')}}" class="img-fluid" alt="slide-1">
					  </div>
					  <div class="carousel-item">
						<img src="{{asset('upload/photo2.jpg')}}" class="img-fluid" alt="slide-2">
					  </div>
					  <div class="carousel-item">
						<img src="{{asset('upload/etudiant.jpg')}}" class="img-fluid" alt="slide-3">
					  </div>
					  <div class="carousel-item">
						<img src="{{asset('upload/logo.png')}}" class="img-fluid" alt="slide-4">
					  </div>
					</div>
				  </div> 




				              
			</div>
		  
	  <!-- Main content -->
	  <section class="content">
		  
		  <div class="row" style="color:black ">
			  <div class="col-xl-4 col-6"  >
				  <div class="box overflow-hidden pull-up bg-temple-dark"style="background:linear-gradient(to right, #ffafbd, #ffc3a0); ">
					  <div class="box-body">							
						  <div class="icon  rounded w-60 h-60" style="background:rgba(250, 235, 215, 0.849)">
							  <i class="text-primary mr-0 font-size-24 mdi mdi-account-settings-variant"></i>
						  </div>
						  <div>
							  <p class="text-mute mt-20 mb-0 font-size-16"  style="color:black !important; font-weight:bold;font-family: Georgia, serif; font-size: 21px;">Admin</p>
							  <h3 class="text-white mb-0 font-weight-500 " style="color:rgb(34, 33, 33) !important ">{{$nbr_admin}} Membres</h3>
						  </div>
					  </div>
				  </div>
			  </div>
			  <div class="col-xl-4 col-6">
				  <div class="box overflow-hidden pull-up  bg-temple-dark" style="background:linear-gradient(to right, #ff7e5f, #feb47b) ">
					  <div class="box-body">							
						  <div class="icon bg-warning-light rounded w-60 h-60" style="background:rgba(250, 235, 215, 0.849)">
							  <i class="text-warning mr-0 font-size-24 mdi mdi-account-edit"></i>
						  </div>
						  <div>
							  <p class="text-mute mt-20 mb-0 font-size-16" style="color:black !important; font-weight:bold;font-family: Georgia, serif; font-size: 21px;">Enseignant</p>
							  <h3 class="text-white mb-0 font-weight-500" style="color:rgb(34, 33, 33) !important ">{{$nbr_ens}} Membres</h3>
						  </div>
					  </div>
				  </div>
			  </div>
			  <div class="col-xl-4 col-6">
				  <div class="box overflow-hidden pull-up bg-temple-dark bg-danger" style="background:linear-gradient(to right, #f9c449, #f9c449) ">
					  <div class="box-body">							
						  <div class="icon bg-info-light rounded w-60 h-60" style="background:rgba(250, 235, 215, 0.849)">
							  <i class="text-info mr-0 font-size-24 mdi mdi-account-multiple"></i>
						  </div>
						  <div>
							  <p class="text-mute mt-20 mb-0 font-size-16" style="color:black !important; font-weight:bold;font-family: Georgia, serif; font-size: 21px;">Etudiant</p>
							  <h3 class="text-white mb-0 font-weight-500 text-mute" style="color:rgb(34, 33, 33) !important ">{{$nbr_etudiant}} Membres</h3>
						  </div>
					  </div>
				  </div>
			  </div>
			
			  
			  
			  <div class="col-xl-6 col-12">
				<div class="box bg-info bg-img" style="background: #d2d2d2 !important">
					<div class="box-body text-center">							
						<img src="{{url('upload/dr.jpg')}}" class="mt-50  " style="width: 50% ;height:50% ; border-radius:50%" alt="" />
						<div class="max-w-500 mx-auto" >
							<h2 class="text-white mb-20 font-weight-500" style="color: rgb(49, 42, 42) !important">Directeur</h2>
							<p class="text-white-50 mb-10 font-size-20" style="color: black !important">Annoncée par le décret 2.13.497 du 01/07/2013, qui prévoit la création de cinq écoles nationales d’architecture à travers les principales régions du Maroc (Fès, Marrakech, Agadir, Oujda et Casablanca), la mise en place de l’Ecole Nationale d’Architecture d’Agadir a été effective en 2017, suite à un partenariat entre le Ministère de l’Urbanisme, l’Université Ibn Zohr, la Région de Souss-Massa, le Conseil Régional des Architectes du Sud, l’Agence
								Urbaine d’Agadir et la Commune d’Agadir.</p>
						</div>
					</div>
				</div>
				
			</div>
			  <div class="col-xl-6 col-12">
				  <div class="box bg-info bg-img" style="background: #d2d2d2 !important">
					  <div class="box-body text-center">							
						  <img src="{{asset('upload/logoena-der.png')}}" class="mt-50" alt="" style="width: 50%;height:50%"/>
						  <div class="max-w-500 mx-auto">
							  <h2 class="text-white mb-20 font-weight-500" style="color: rgb(49, 42, 42) !important">Présentation de l’ENA Agadir </h2>
							  <p class="text-white-50 mb-10 font-size-20" style="color: black !important">L’Ecole Nationale d’Architecture est un établissement public d’enseignement supérieur et de formation de cadres professionnels des secteurs publics et privés. Elle est sous la tutelle du Ministère de l’Urbanisme et de l’Aménagement du Territoire. Sa création fût confiée au Ministère de l’Habitat et de l’Aménagement du Territoire à Rabat, Division de l’Architecture. , qui prévoit l’inauguration de cinq écoles nationales d’architecture à travers les principales régions du Maroc (Fès, Marrakech, Casablanca, Oujda et Agadir).
								De sa création récente, suite à un partenariat entre le Ministère de l’Urbanisme et l’Université Ibn Zohr,l’ENA d’Agadir se veut un établissement d’enseignement supérieur deréférence dans les métiers liés à l’architecture et l’urbanisme à l’échelle nationale, régionale et internationale.
								</p>
						  </div>
					  </div>
				  </div>
				 
			  </div>
			  
			  
			
		  </div>
	  </section>
	  <!-- /.content -->
	</div>
</div>
<!-- /.content-wrapper -->

  @endsection
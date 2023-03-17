<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="{{asset('backend/images/logoena30x30.png')}}">
  <!--  <link rel="icon" href="../images/favicon.ico"> -->

    <title>ENA Agadir - Log in </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{asset('backend/css/skin_color.css')}}">	

</head>
<body class="hold-transition theme-primary bg-gradient-primary" style="background: url('{{asset('backend/images/background.jpg')}}');background-repeat: no-repeat; background-position: 0 0; background-size: cover; background-attachment: fixed;"  >
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed" style="background: #0a0a0a9e">
							<img id="showImage" src="{{asset('backend/images/ENA.png')}}" style="width:100px; width:100px;border:1px solid #000; border-radius:50%; text-align:center; margin:auto; display:flex "  alt="">

							<div class="content-top-agile p-10">
								<h2 class="text-white">ENA AGADIR</h2>
								<p class="text-white-50">Connectez-vous à votre compte</p>							
							</div>
							
							<form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
										</div>
										<input type="email" id="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input type="password" id="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Mot de passe">
									</div>
								</div>
								  <div class="row">
									<div class="col-8">
									  <div class="checkbox text-white">
										<input type="checkbox" id="basic_checkbox_1" >
										<label for="basic_checkbox_1">Se souvenir de moi</label>
									  </div>
									</div>
									<!-- /.col -->
								
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-rounded mt-10" >Connexion</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>														

							
							
							<div class="text-center" hidden="hidden">
								<p class="mt-15 mb-0 text-white">Créer un compte  :<a href="{{ route('register') }}" class="text-info ml-5" style="color: #41b4e0  !important">Cliquer ici</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	

</body>
</html>

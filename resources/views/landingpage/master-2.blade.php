<!doctype html>
<html lang="en">
  <head>
	<!-- meta login -->
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<!-- end meta login -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title></title>
  </head>
  <style>
		.active{
			background-color: #D4D4D4;
		}
		.navbar{
			
			
			box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 50%);
			background-color: azure; 
			width: 100%;

			
		}
		.navbar-nav{
			font-family: 'Time new Roman';
			font-size: 1rem;
			font-weight:bold;
			
		}
		.navbar-dark .navbar-nav .nav-link {
		    color: #000050 !important;
		    font-size: 1rem;
		}
		.navbar-nav .nav-item:hover {
			background-color: #D4D4D4;
			
		}
		.dropdown-menu .dropdown-item:hover {
		    background-color: #D4D4D4;
			
		}
		body {
			font-size: 1rem;
			padding-top: 70px; 
		}
		.main {
  			margin-top: 30px; /* Add a top margin to avoid content overlay */
		}
	</style>
	
	<link rel="stylesheet" href="{{asset('font/trajanfont.css')}}">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <body>
  <!-- ini navbar-->
	<nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-dark py-0 px-0 m-0" style="">
		<div class="row align-items-center mb-1 mx-0">
			<div class="col-sm-12 col-md-12 col-lg-10 col-xl-5 text-center p-3">
				<img class="img-fluid" src="{{asset('/img/bumn.png')}}" style="max-width: 150px;">
			</div>
		</div>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container-fluid px-0" style="max-width: 100%;">
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto">
				<li class="nav-item px-3 py-2 mx-3" style="padding-left:40px;">
					<a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
				</li>
				
				<li class="nav-item dropdown px-3 py-2 dokumentasi mx-1">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dokumentasi
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item 5R" href="{{url('/5R')}}" style="height:50px;">Dokumentasi 5R</a>
		          <a class="dropdown-item foto" href="{{url('/dokumentasi-foto')}}" style="height:50px">Dokumentasi Foto</a>
		          <a class="dropdown-item video" href="{{url('/dokumentasi-video')}}" style="height:50px">Dokumentasi Video</a>
                </div>
		      </li>
		    </ul>
		  	</div>
		</div>
		<div class="row align-items-center mb-1 mx-0">
			<div class="col-sm-12 col-md-12 col-lg-10 col-xl-5 text-center p-3">
			    <img class="img-fluid" src="{{asset('/img/logo-pal.png')}}" style="max-width: 150px;">
			</div>
		</div>
	</nav>
	
	<div class="main" style="min-height:550px">
	@yield('konten')
		

	</div>
	

		<!-- script -->
<!-- footer -->
@include('komponen/footer')

	
@yield('script')
<script>
document.querySelectorAll('a[href^="#header"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
		$(document).ready(function() {
		var clickedItem = $(".home");
		$(".nav-item").each( function() {
			$(this).removeClass("active");
		});
		clickedItem.addClass("active");
		});
    });
});
</script>
  </body>
</html>
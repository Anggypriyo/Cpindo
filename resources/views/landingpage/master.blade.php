<!doctype html>
<html lang="en">
  <head>
	<!-- meta login -->
<title>@yield('title')</title>
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
			background-color: #800000;
			border-radius: 30px;  
		}
		.active .nav-link{
			background-color: #800000 !important;
			border-radius: 30px;  
		}
		.navbar{
			
			
			box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 50%);
			background-color: #964B00; 
			width: 100%;

			
		}
		.navbar-nav{
			font-family: 'Times new Roman';
			font-size: 1rem;
			font-weight:bold;
			border-radius: 30px;  
		}
		.navbar-dark .navbar-nav .nav-link {
		    color: #ffffff !important;
		    font-size: 16px;
		}
		.navbar-nav .nav-item:hover {
		    background-color: #800000;
			border-radius: 30px;  
		}
		.dropdown-menu .dropdown-item:hover {
		    background-color: #800000;
			
		}
		body {
			font-size: 1rem;
			padding-top: 70px; 
		}
		.main {
  			margin-top: 30px; /* Add a top margin to avoid content overlay */
		}
	</style>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
	
	
	
  <body>
  <!-- ini navbar-->
	<nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-dark py-0 px-0 m-0" style="">
		<div class="row align-items-center mb-1 mx-0">
			<div class="col-sm-12 col-md-12 col-lg-10 col-xl-5 text-center p-3">
				<img class="img-fluid" src="{{asset('/img/logo_pindo.png')}}" style="max-width: 75px;">
			</div>
		</div>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container-fluid px-0" style="max-width: 100%;">
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto">
				<li class="nav-item  px-2 py-2 home mx-3">
					<a class="nav-link" href="#header">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item  py-2 tentang mx-3">
					<a class="nav-link " href="#profiltentang">Tentang Pindo</a>
				</li>
				<li class="nav-item  py-2 lokasi mx-3">
					<a class="nav-link " href="#profillokasi">Lokasi Pindo</a>
				</li>
				<li class="nav-item  py-2 struktur mx-3">
					<a class="nav-link " href="/menu">Menu Pindo</a>
				</li>
		    </ul>
		  	</div>
		</div>
		<div class="row align-items-center mb-1 mx-0">
			<div class="col-sm-12 col-md-12 col-lg-10 col-xl-5 text-center p-3">
				<!-- <img class="img-fluid" src="{{asset('/img/logo-pal.png')}}" style="max-width: 150px;"> -->
			</div>
		</div>
	</nav>
	
	<div class="main" style="min-height:452px">
	
	   @yield('konten')
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


		<!-- script -->
<!-- footer -->
@include('landingpage/footer')
@yield('script')
<script>
$(document).ready(function() {
		var clickedItem = $(".home");
		$(".nav-item").each( function() {
			$(this).removeClass("active");
		});
		clickedItem.addClass("active");
		});
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
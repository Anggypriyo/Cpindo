<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Menu Pindo</title>
  </head>
  <style>
  		.active{
			background-color: #800000;
            border-radius: 30px;  
		}
		.active .nav-link{
			color: #800000 !important;
            border-radius: 30px;  
		}
		.navbar{
			
			
			box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 50%);
			background-color: #964B00; 
			width: 100%;

			
		}
		.navbar-nav{
			font-family: 'Time new Roman';
			font-size: 1rem;
			font-weight:bold;
			
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
		h7{
			text-transform: uppercase;
            color:#964B00 !important;
		}
		h5{
			text-transform: capitalize;
            color:#964B00 !important;
		}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('font/trajanfont.css')}}">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
				<li class="nav-item px-4 pt-1 home " style="padding-left:40px;">
					<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item px-4 pt-1 makanan ">
					<a class="nav-link" href="#makanan">Makanan</a>
				</li>
				<li class="nav-item px-4 pt-1 minuman">
					<a class="nav-link" href="#minuman">Minuman</a>
				</li>
				<li class="nav-item px-4 pt-1 Paket ">
					<a class="nav-link" href="#Paket">Paket</a>
				</li>
		    </ul>
		  	</div>
		</div>
	</nav>
	<div class="main" style="min-height:452px">
		<div class="container"  id="makanan" style="height:100px">
		</div>
        <h1 align="center" style="margin-top:20px;color:#964B00">Menu Makanan</h1>

        <div class="row">
			@foreach($menu as $peg)
			@if($peg->katmenu->kategori == "Makanan")
				<div class="col-3">
					<div class="card shadow" style="width: 16rem; height:24rem; margin:0 auto;" >
						<img src="{{ asset($peg->foto_menu) }}" class="card-img-top" alt="..." style="max-height:24rem">
						<div class="card-body text-center">
                        <h7 class="card-title">{{$peg->katmenu->nama_katmenu}}</h7>
						<h5 class="card-title">{{$peg->nama_menu}}</h5>
						</div>
					</div>
    </br></br>
				</div>
			@endif
			@endforeach
			</div>

		<div class="container" id="minuman" style="height:120px">
		</div>
        <h1 align="center" style="margin-top:0px;color:#964B00">Menu Minuman</h1>

        <div class="row">
			@foreach($menu as $peg)
			@if($peg->katmenu->kategori == "Minuman")
				<div class="col-3">
					<div class="card shadow" style="width: 16rem; height:24rem; margin:0 auto;" >
						<img src="{{ asset($peg->foto_menu) }}" class="card-img-top" alt="..." style="max-height:24rem">
						<div class="card-body text-center">
                        <h7 class="card-title">{{$peg->katmenu->nama_katmenu}}</h7>
						<h5 class="card-title">{{$peg->nama_menu}}</h5>
						</div>
					</div>
    </br></br>
				</div>
			@endif
			@endforeach
			</div>

		<div class="container" id="Paket" style="height:120px">
		</div>
        <h1 align="center" style="margin-top:0px;color:#964B00">Paket Keluarga</h1>

        <div class="row">
			@foreach($menu as $peg)
			@if($peg->katmenu->kategori == "Paket")
				<div class="col-3">
					<div class="card shadow" style="width: 16rem; height:24rem; margin:0 auto;" >
						<img src="{{ asset($peg->foto_menu) }}" class="card-img-top" alt="..." style="max-height:24rem">
						<div class="card-body text-center">
                        <h7 class="card-title">{{$peg->katmenu->nama_katmenu}}</h7>
						<h5 class="card-title">{{$peg->nama_menu}}</h5>
						</div>
					</div>
                    </br></br>
				</div>
			@endif
			@endforeach
			</div>

		<div class="container" style="height:25px">
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://unpkg.com/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
 	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
		var clickedItem = $(".makanan");
		$(".nav-item").each( function() {
			$(this).removeClass("active");
		});
		clickedItem.addClass("active");
		});
document.querySelectorAll('a[href^="#makanan"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
		$(document).ready(function() {
		var clickedItem = $(".makanan");
		$(".nav-item").each( function() {
			$(this).removeClass("active");
		});
		clickedItem.addClass("active");
		});
    });
});
document.querySelectorAll('a[href^="#minuman"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
		$(document).ready(function() {
		var clickedItem = $(".minuman");
		$(".nav-item").each( function() {
			$(this).removeClass("active");
		});
		clickedItem.addClass("active");
		});
    });
});
document.querySelectorAll('a[href^="#DFU"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
		$(document).ready(function() {
		var clickedItem = $(".DFU");
		$(".nav-item").each( function() {
			$(this).removeClass("active");
		});
		clickedItem.addClass("active");
		});
    });
});
document.querySelectorAll('a[href^="#DAP"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
		$(document).ready(function() {
		var clickedItem = $(".DAP");
		$(".nav-item").each( function() {
			$(this).removeClass("active");
		});
		clickedItem.addClass("active");
		});
    });
});
document.querySelectorAll('a[href^="#Paket"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
		$(document).ready(function() {
		var clickedItem = $(".Paket");
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
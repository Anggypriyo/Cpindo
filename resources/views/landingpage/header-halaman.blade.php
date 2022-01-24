
<style>

.skyblue {
  background-color: #22c8ff;
}

.carousel-indicators {
  bottom: 0;
}
.carousel-control.right,
.carousel-control.left {
  background-image: none;
}
.carousel-item {
  min-height: 350px; 
  height: 100%;
  width:100%; 
}
.carousel-caption h3,
.carousel .icon-container,
.carousel-caption button {
  background-color: #000050;
  opacity: 0.7;
}
.carousel-caption h3 {
  padding: .5em;
}
.carousel .icon-container {
  display: inline-block;
  font-size: 25px;
  line-height: 25px;
  padding: 1em;
  text-align: center;
  border-radius: 50%;
}
.carousel-caption button {
  border-color: #00bfff;
  margin-top: 1em; 
}

/* Animation delays */
.carousel-caption h3:first-child {
  animation-delay: 1s;
}
.carousel-caption h3:nth-child(2) {
  animation-delay: 2s;
}
.carousel-caption button {
  animation-delay: 3s;
}

h1 {
  text-align: center;  
  margin-bottom: 30px;
  font-size: 30px;
  font-weight: bold;
}

.p {
  padding-top: 125px;
  text-align: center;
}

.p a {
  text-decoration: underline;
}
</style>
    <div class="col-12">

      <!-- carousel code -->
      <div id="carouselExampleIndicators" class="carousel slide">
        <ol class="carousel-indicators">
          @foreach($profilutama as $header)
          @if ($loop->first)
          <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration}}" class="active"></li>
          @else
          <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration}}"></li>
          @endif
          @endforeach
        </ol>
        <div class="carousel-inner skyblue">
          <!-- first slide -->
          
        <?php 
/*
          <!-- second slide -->
          <div class="carousel-item skyblue">
          <img src="{{asset('/img/header.jpg')}}" class="d-block" style="height:800px;width:100%">
            <div class="carousel-caption d-md-block">
              <h3 class="icon-container" data-animation="animated bounceInDown">
                <span class="fa fa-heart"></span>
              </h3>
              <h3 data-animation="animated bounceInUp">
                This is the caption for slide 2
              </h3>
              <button class="btn btn-primary btn-lg" data-animation="animated zoomInRight">Button</button>
            </div>
          </div>
*/?>
          @foreach($profilutama as $header)
          @if ($loop->first)
          <div class="carousel-item active skyblue">
          <img src="{{ asset($header->path_profil) }}" class="d-block" style="height:800px;width:100%">
            <div class="carousel-caption d-md-block">
              <h3 data-animation="animated bounceInRight">
                Selamat Datang PINDO
              </h3>
              <!--<h3 data-animation="animated bounceInLeft">
                {{$header->judul_profil}}
              </h3>-->
            </div>
          </div>
          @else
          
          <!-- third slide -->
          <div class="carousel-item skyblue">
          <img src="{{ asset($header->path_profil) }}" class="d-block" style="height:800px;width:100%">
            <div class="carousel-caption d-md-block">
              <!--<h3 class="icon-container" data-animation="animated zoomInLeft">
                <span class="fa fa-glass"></span>
              </h3>
              -->
              <h3 data-animation="animated flipInX">
                {{$header->judul_profil}}
              </h3>
            </div>
          </div>
          @endif
          @endforeach
        </div>
       
        <!-- controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>

    </div>


<!--
    <img src="{{asset('/img/header.jpg')}}" class="card-img img-fluid img-rounded" style="height:800px;">
    <h5 class="text-center text-white pt-5" style="margin-top:-300px;font-size:50px;text-shadow: 1px 3px 8px grey">Divisi KAWASAN <br>PT PAL Indonesia</h5>
-->
@section('script')

<script>
(function($) {
  //Function to animate slider captions
  function doAnimations(elems) {
    //Cache the animationend event in a variable
    var animEndEv = "webkitAnimationEnd animationend";

    elems.each(function() {
      var $this = $(this),
        $animationType = $this.data("animation");
      $this.addClass($animationType).one(animEndEv, function() {
        $this.removeClass($animationType);
      });
    });
  }

  //Variables on page load
  var $myCarousel = $("#carouselExampleIndicators"),
    $firstAnimatingElems = $myCarousel
      .find(".carousel-item:first")
      .find("[data-animation ^= 'animated']");

  //Initialize carousel
  $myCarousel.carousel();

  //Animate captions in first slide on page load
  doAnimations($firstAnimatingElems);

  //Other slides to be animated on carousel slide event
  $myCarousel.on("slide.bs.carousel", function(e) {
    var $animatingElems = $(e.relatedTarget).find(
      "[data-animation ^= 'animated']"
    );
    doAnimations($animatingElems);
  });
})(jQuery);
</script>
@endsection
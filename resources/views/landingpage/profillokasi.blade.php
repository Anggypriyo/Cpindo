<style>
.denah-kawasan h3 {
  font-weight:bold;
  margin-bottom:20px;
  padding-top:5px;
  color:'white';
}
</style>
<div class="container">
<!--
        <div id="corouselDenah" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#corouselDenah" data-slide-to="0" class="active"></li>
                @foreach($profillokasi as $layouts)
                <li data-target="#corouselDenah" data-slide-to="{{$loop->iteration}}"></li>
                @endforeach
            </ol>
        <div class="carousel-inner">
        <div class="carousel-item active" data-interval="1000">
            <img src="/img/BANUWATI.jpg" class="d-block w-100" alt="..." style="width:80%;height:80%">
                <div class="carousel-caption d-none d-md-block">
                <h1 class="shadows">DENAH KAWASAN</h1>
                </div>
            </div>
            @foreach($profillokasi as $layouts)
            <div class="carousel-item" data-interval="1000">
            <img src="{{$layouts->path_profil}}" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block" style="vertical-align:top;">
                <h1 style="  text-shadow: 2px 2px 2px #000000;">{{$layouts->judul_layout}}</h1>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#corouselDenah" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#corouselDenah" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
-->
    @foreach($profillokasi as $layouts)
    <div class="col-12">
        <h1 style="text-align:center; padding:20px;color:white">{{$layouts->judul_layout}}</h1>
        <img src="{{asset($layouts->path_profil)}}" class="card-img img-fluid img-rounded shadow" style="height:500px;margin:20px">
    </div>
    @endforeach   
</div>

<script>
document.querySelectorAll('a[href^="#kawasan"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
        var clickedItem = $(".denah");
        $(".nav-item").each( function() {
            $(this).removeClass("active");
        });
        clickedItem.addClass("active");
    });
});
</script>
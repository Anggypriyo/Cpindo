<style>
.carousel-caption h5{
    background-color: #964B00;
    opacity: 0.7;
    border-radius: 30px;  
}
.carousel-item  {
  min-height: 100px; 
  height: 100%;
  width:100%; 
}
</style>
<div class="profiltentang">
    <table style="width:100%;color:white;">
        <tr>
        <td style="width:50%;text-align:center">
            <h4 style="">Tentang Kami</h4>
        </td>
        <td  rowspan="2" style="width:50%;padding:25px;height:350px">
        
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($profiltentang as $award)
                @if($loop->first)
                <div class="carousel-item active" data-interval="3000">
                <img src="{{ asset($award->path_profil) }}" style="width:100%;height:100%" alt="...">
                    <div class="carousel-caption d-md-block">
                    <h5>
                        {{$award->judul_profil}}
                    </h5>
                    </div>
                </div>
                @else
                <div class="carousel-item" data-interval="3000">
                <img src="{{ asset($award->path_profil) }}"  style="width:100%;height:100%" alt="...">
                    <div class="carousel-caption d-md-block">
                    <h5>
                        {{$award->judul_profil}}
                    </h5>
                    </div>
                </div>
                @endif
                @endforeach
                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </td>
            
        </tr>
        <tr>
        <td style="vertical-align:text-top;text-align:justify;padding:25px;font-size:18px">
        <ul>
            <li>
            <p>Resto industrial modern dan adat Indonesia pertama di Sidoarjo-Surabaya!!</p>
            </li>
        </ul>
            <ul>
                <li>
                    Cari rumah makan keluarga untuk kumpul santai bersama? Ingin bercengkrama dengan sahabat anda?
                    Welcome To Warung Pindo!!
                </li>
            </ul>
            </p>
            <p><B>Penawaran</B>
            <ul>
            <li>Makanan Halal</li>
            <li>Suasana Nyaman dan Santai</li>
            <li>Menu Selalu Tersedia</li>

            </ul>
            
            </p>
            <img class="img-fluid" src="{{asset('/img/gofood.png')}}" style="max-width: 100px;">
            <img class="img-fluid" src="{{asset('/img/grabfood.png')}}" style="max-width: 100px;">
        </td>
        <td>
        
        </td>
        </tr>
    </table>
    
      
</div>

<script>
document.querySelectorAll('a[href^="#profiltentang"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
        var clickedItem = $(".tentang");
        $(".nav-item").each( function() {
            $(this).removeClass("active");
        });
        clickedItem.addClass("active");
    });
});
</script>

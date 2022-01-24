<style>
.denah-profillokasi h3 {
  font-weight:bold;
  margin-bottom:20px;
  padding-top:5px;
  color:'white';
}
.dashed {border-style: dashed;}
</style>
<div class="container">
    @foreach($profillokasi as $layouts)
    <div class="col-12">
        <!-- <h1 style="text-align:center; padding:20px;color:white">{{$layouts->judul_layout}}</h1> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.833967921124!2d112.70128262992424!3d-7.37249867462415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e39a986f8f3d%3A0x600e2dff20279224!2sWarung%20Pindo!5e0!3m2!1sid!2sid!4v1643024385075!5m2!1sid!2sid" width="600" height="450" style="border:dashed white;margin:75px" allowfullscreen="" loading="lazy"></iframe>
        <img src="{{asset($layouts->path_profil)}}" class="card-img img-fluid img-rounded shadow" style="width:200px;height=300px;margin-top:-500px;">
    </div>
    @endforeach   
</div>
</br>
<script>
document.querySelectorAll('a[href^="#profillokasi"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
        var clickedItem = $(".lokasi");
        $(".nav-item").each( function() {
            $(this).removeClass("active");
        });
        clickedItem.addClass("active");
    });
});
</script>
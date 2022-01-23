<style>
.carousel-caption h5{
    background-color: #000050;
    opacity: 0.7;
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
                <img src="{{ asset($award->path_profil) }}" style="width:50%;height:50%" alt="...">
                    <div class="carousel-caption d-md-block">
                    <h5>
                        {{$award->judul_profil}}
                    </h5>
                    </div>
                </div>
                @else
                <div class="carousel-item" data-interval="3000">
                <img src="{{ asset($award->path_profil) }}"  style="width:50%;height:50%" alt="...">
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
        <td style="vertical-align:text-top;text-align:justify;padding:25px;font-size:12px">
        <ul>
            <li>
            <p>Divisi Kawasan adalah unit kerja struktural tingkat Divisi dalam organisasi Direktorat SDM & Umum dan dipimpin oleh seorang Kepala Divisi Kawasan, berkedudukan langsung di bawah dan bertanggung jawab kepada Direktur SDM & Umum.</p>
            </li>
        </ul>
                   
            <p><B>Tugas Pokok</B></br>
            <ul>
                <li>
                Menjabarkan dan melaksanakan kebijakan perusahaan dalam bidang pengelolaan dan pemeliharaan bangunan, infrastruktur, utilitas, aset perusahaan, tata ruang & tata graha. kebersihan & pertamanan, pencegahan & penanggulangan kebakaran serta 
            pengadaan barang & jasa non produksi & sarana prasarana perkantoran di lingkungan PT. PAL Indonesia (Persero).
                </li>
            </ul>
            </p>
            <p><B>Fungsi</B>
            <ol>
                <li>Penanggulangan dan pencegahan kebakaran di area perusahaan</li>
                <li>Pengelolaan dan pemeliharaan bangunan / fasilitas perkantoran perusahaan beserta infrastrukturnya</li>
                <li>Pemeliharaan dan pengelolaan utilitas perusahan</li>
                <li>Perencanaan dan pengendalian anggaran investasi bangunan dan infrastruktur perusahaan</li>
                <li>Pengelolaan dan mengkoordinir aset (aktiva tetap) berwujud perusahaan</li>
                <li>Penataan dan pengaturan sandar kapal di area perusahaan</li>
                <li>Pengelolaan tata ruang & tata graha di area perusahaan</li>
                <li>Pengelolaan pengadaan barang & jasa non produksi / sarana prasarana perkantoran</li>
            </ol>
            </p>
        </td>
        <td>
        
        </td>
        </tr>
    </table>
    
    <div class="container" id="visi-misi">
    </div>
    
      
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

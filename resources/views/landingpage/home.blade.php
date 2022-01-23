@extends('landingpage/master')
@section('content')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
@endsection
@section('title','Home')
<!-- konten web --> 
@section('konten')
<div class="header" id="header" style="height:900px;background-color:#000050;margin-top:-100px">
		<!-- header -->
		@include('landingpage/header-halaman')
        <div class="container" id="profiltentang">
        </div>
        </div>
        
		<div class="profiltentang" style="height:550px;background-color:#000050;width:100%;">
		<!-- profiltentang -->
		@include('landingpage/profiltentang')
		
        </div>
        
        <div>
		</div>
		<div class="profillokasi2" id="profillokasi"></div>
		</div>
		<!-- Lokasi Pindo -->
		<div class="profillokasi"  style="height:100px;background-color:#FFFFFF;">
			<div class="col-12">
				<h1 align="center" style="margin-top:50px">Lokasi Pindo</h1>
			</div>
		</div>
		<div class="profillokasi" style="height:auto;background-color:#000050">
		@include('landingpage/profillokasi')
		</div>

@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    var clickedItem = $(".home");
    $(".nav-item").each( function() {
        $(this).removeClass("active");
    });
    clickedItem.addClass("active");
});
</script>
@endsection
@section('master-footer')
@section('master-script')
@yield('script')

@endsection
@include('landingpage/footer')
@endsection

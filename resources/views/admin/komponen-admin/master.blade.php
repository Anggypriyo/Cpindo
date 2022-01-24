<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>@yield('title')</title>

  <!-- CSS Eksternal -->
  @include('admin/komponen-admin/css-eksternal')
  <!-- Favicon icon -->
  <link rel="icon" type="image" sizes="16x16" href="{{ asset('/img/logo_pindo.png') }}">
  <!-- css internal -->
  @yield('css')

</head>
<body>
<div class="wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- Page wrapper  -->
        <!-- ============================================================== -->
        
  <!-- top navbar -->
  @include('admin/komponen-admin/top-bar')

  <!-- Side Navbar -->
  @include('admin/komponen-admin/side-bar')

  <!-- konten layout -->
  <div class="page-wrapper">
  @yield('content')
  </div>
  <!-- footer layout -->
  @include('admin/komponen-admin/footer-layout')

  <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->
</div>
<!-- js ekternal -->
@include('admin/komponen-admin/js-eksternal')

<!-- js internal -->
@yield('script')

</body>
</html>

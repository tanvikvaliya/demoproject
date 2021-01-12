<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/backend/all.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" >
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('css/backend/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('css/backend/icheck-bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('css/backend/jqvmap.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/backend/adminlte.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('css/backend/OverlayScrollbars.min.css') }}" rel="stylesheet" type="text/css" >
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('css/backend/daterangepicker.css') }}" rel="stylesheet" type="text/css" >
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('css/backend/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css" >
  <link rel="stylesheet" href="{{ asset('css/backend/responsive.bootstrap4.min.css') }}">
   <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('css/backend/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/backend/buttons.bootstrap4.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/backend/all.min.css') }}">
  <!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/backend/adminlte.min.css') }}">
  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed" id="page-top" class="index">


    @include('layouts.partials._navigation')
     @include('layouts.partials._header')

    @yield('content')
    @yield('login')
    @yield('register')
    @yield('reset')

    @include('layouts.partials._footer')


<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui.min.js') }}" ></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('js/sparkline.js') }}" ></script>
<!-- JQVMap -->
<script src="{{ asset('js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('js/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('js/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('js/summernote-bs4.min.js') }}" ></script>
<!-- overlayScrollbars -->
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="{{ asset('js/jvalidation.js') }}"></script>
@yield('js')
</body>
</html>

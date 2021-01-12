<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/frontend/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/frontend/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('images/frontend/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/frontend/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/frontend/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/frontend/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/frontend/ico/apple-touch-icon-57-precomposed.png') }}">
    @yield('css')
</head><!--/head-->


@include('pages.frontend.layout._header')


@yield('content')


@include('pages.frontend.layout._footer')
<script src="{{ asset('js/frontend/jquery.js') }}"></script>
<script src="{{ asset('js/frontend/price-range.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('js/frontend/main.js') }}"></script>
@yield('js')
</body>
</html>
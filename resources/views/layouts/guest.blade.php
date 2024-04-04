<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">

		@env('local')
			<meta name="robots" content="noindex, nofollow">
		@endenv

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name') }}</title>

		{{-- Google Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

		{{-- Volt CSS --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('css/theme/admin/volt.css') }}">
		<link href="{{ asset('css/theme/home/variables-orange.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/theme/home/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/theme/home/custom.css') }}" rel="stylesheet" type="text/css">

		{{-- Bootstrap icons --}}
		<link type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

		{{-- bootstrap-select --}}
		<link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap-select/bootstrap-select.min.css') }}">

		@stack('styles')
	</head>

	<body>

		@include('layouts.partials.home.header')
		
		<main id="main">

      {{ $slot }}

		</main>

		@if (route('register') == request()->url())
			@include('layouts.partials.home.footer')
		@endif

		@vite('resources/js/app.js')

		{{-- Core --}}
		<script src="{{ asset('vendor/@popperjs/popper.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

		{{-- sweetalert --}}
		<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
		@include('sweetalert::alert')
		{{-- Smooth scroll --}}
		<script src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>
		{{-- bootstrap-select--}}
		<script type="text/javascript" src="{{ asset('vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
		{{-- Volt JS --}}
		<script src="{{ asset('js/theme/admin/volt.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/theme/admin/custom.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/theme/home/main.js') }}"></script>
		{{-- page specific js files --}}
		@stack('scripts')
	</body>

</html>

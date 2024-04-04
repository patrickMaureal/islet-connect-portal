<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	@env('local')
		<meta name="robots" content="noindex, nofollow">
	@endenv

	<title>{{ config('app.name', 'Laravel') }}</title>

	{{-- Theme CSS --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('css/theme/admin/volt.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/theme/admin/custom.css') }}">

	{{-- Bootstrap icons --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">

	{{-- datatable --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap-datatables/bootstrap-datatable.min.css') }}">

	{{-- bootstrap-select --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap-select/bootstrap-select.min.css') }}">

	{{-- leaflet --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}">

	{{-- glightbox --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">

	{{-- page specific css --}}
	@stack('styles')

</head>

<body>

	@include('layouts.partials.admin.sidebar')

	<main class="content">

		@include('layouts.partials.admin.navbar')

		{{-- page content --}}
		{{ $slot }}

		{{-- footer --}}
		@include('layouts.partials.admin.footer')

	</main>

	@vite('resources/js/app.js')

	{{-- popper for dropdowns --}}
	<script type="text/javascript" src="{{ asset('vendor/@popperjs/popper.min.js') }}"></script>

	{{-- jquery --}}
	<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

	{{-- bootstrap --}}
	<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

	{{-- datatables --}}
	<script type="text/javascript" src="{{ asset('vendor/bootstrap-datatables/jquery.datatables.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('vendor/bootstrap-datatables/bootstrap-datatables.min.js') }}" ></script>

	{{-- Smooth scroll --}}
	<script type="text/javascript" src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>

	{{-- sweetalert --}}
	<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
	@include('sweetalert::alert')

  {{-- webcam--}}
  <script type="text/javascript" src="{{ asset('vendor/webcamjs/webcam.min.js') }}"></script>

  {{-- bootstrap-select--}}
  <script type="text/javascript" src="{{ asset('vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>

	{{-- leaflet --}}
  <script type="text/javascript" src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>

	{{-- glightbox --}}
  <script type="text/javascript" src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>

	{{-- Chart JS --}}
	<script type="module" src="{{ asset('vendor/chartjs/chart.umd.js') }}"></script>

	{{-- Volt JS --}}
	<script type="text/javascript" src="{{ asset('js/theme/admin/volt.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/theme/admin/custom.js') }}"></script>

	{{-- page specific js files --}}
	@stack('scripts')

</body>

</html>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>{{ config('app.name') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/theme/timeline/timeline.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/leaflet/leaflet.css') }}" rel="stylesheet" type="text/css">

		{{-- Fontawesome icons --}}
		<link type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    {{-- livewire --}}
    @livewireStyles(['nonce' => csp_nonce()])

    {{-- Template Main CSS File --}}
    <link href="{{ asset('css/theme/home/variables-orange.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/theme/home/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/theme/home/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/theme/home/islet-profile.css') }}" rel="stylesheet" type="text/css">



		{{-- page specific css --}}
		@stack('styles')
  </head>

  <body>

    @include('layouts.partials.home.header')

		@if (url('/') == request()->url())
			@include('layouts.partials.home.hero')
		@endif

    <main id="main">

      {{-- page content --}}
      {{ $slot }}

    </main>

    @include('layouts.partials.home.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    {{-- Vendor JS Files --}}
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/theme/timeline/timeline.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>
		{{-- sweetalert --}}
		<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
		@include('sweetalert::alert')

    {{-- livewire --}}
    @livewireScripts(['nonce' => csp_nonce()])

    {{-- Template Main JS File --}}
    <script src="{{ asset('js/theme/home/main.js') }}"></script>

		{{-- Template Custom JS File --}}
		<script src="{{ asset('js/theme/admin/custom.js') }}"></script>

    {{-- page specific js --}}
    @stack('scripts')

  </body>

</html>

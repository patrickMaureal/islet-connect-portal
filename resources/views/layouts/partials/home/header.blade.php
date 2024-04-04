<header id="header" class="header fixed-top" data-scrollto-offset="0">
  <div class="container-fluid d-flex align-items-center justify-content-between px-5">
		<div class="nav-bg">
			<img src="{{ asset('img/homepage/header/header-wave.png') }}" alt="">
		</div>
    <a href="{{ url('/') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
      <img src="{{ asset('img/homepage/header/islet-connect-logo.png') }}" alt="" class="img-fluid">
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="{{ url('/') }}">Home</a></li>
				<li class="dropdown"><a class="nav-link scrollto" href="{{ url('/#about') }}"><span>About</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
					<ul>
						<li><a class="nav-link scrollto" href="{{ url('/#partners') }}">Our Partners</a></li>
						<li><a class="nav-link scrollto" href="{{ url('/#project-milestones') }}">Project Milestones</a></li>
					</ul>
				</li>
        <li><a class="nav-link scrollto" href="{{ url('/#resources') }}">e-Education</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/#tourism') }}">Tourism</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/#livelihood') }}">Livelihood</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/#contact') }}">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle d-none"></i>
    </nav>

		<div class="nav-options">
			@if (route('register') != request()->url())
				<li><a class="nav-link scrollto" href="{{ route('register') }}">Register Your LGU</a></li>
			@endif
		</div>


  </div>
</header>

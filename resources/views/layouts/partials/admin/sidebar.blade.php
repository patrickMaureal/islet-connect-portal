{{-- sidebar toggle --}}
<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
	<a class="navbar-brand me-lg-5" href="{{ route('dashboard') }}">
		<img class="navbar-brand-dark" src="{{ asset('img/brand/isletconnect-icon.png') }}" alt="Volt logo" />
		<img class="navbar-brand-light" src="{{ asset('img/brand/isletconnect-icon.png') }}" alt="Volt logo" />
	</a>
	<div class="d-flex align-items-center">
		<button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
			data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
</nav>

{{-- sidebar --}}
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
	<div class="sidebar-inner px-4 pt-3">
		<div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
			<div class="d-flex align-items-center">
				<div class="avatar-lg me-4">
					<img src="{{ auth()->user()->getFirstMediaUrl('profiles') ? auth()->user()->getFirstMediaUrl('profiles') : asset('img/team/profile-picture-3.jpg') }}" class="card-img-top rounded-circle border-white"
						alt="">
				</div>
				<div class="d-block">
					<h2 class="h5 mb-3">Hi, {{ auth()->user()->name }}!</h2>
					{{-- Authentication --}}
					<form class="logout-form" action="{{ route('logout') }}" method="POST">
						@csrf
						<a href="" class="logout btn btn-secondary btn-sm d-inline-flex align-items-center" >
							<i class="icon icon-xxs me-1 bi bi-box-arrow-right"></i>
							Logout
						</a>
					</form>
				</div>
			</div>
			<div class="collapse-close d-md-none">
				<a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
					aria-expanded="true" aria-label="Toggle navigation">
					<i class="icon fs-1 icon-md bi bi-x"></i>
				</a>
			</div>
		</div>
		<ul class="nav flex-column pt-3 pt-md-0">
			<li class="nav-item">
				<a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">
					<span class="sidebar-icon">
						<img src="{{ asset('img/brand/isletconnect-icon.png') }}" height="20" width="20" alt="Volt Logo">
					</span>
					<span class="mt-1 ms-1 sidebar-text">ISLET CONNECT</span>
				</a>
			</li>
			<li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
				<a href="{{ route('dashboard') }}" class="nav-link">
					<span class="sidebar-icon">
						<i class="icon icon-xs me-2 bi bi-speedometer"></i>
					</span>
					<span class="sidebar-text">Dashboard</span>
				</a>
			</li>
			<li class="nav-item {{ request()->routeIs('analytics.*') ? 'active' : '' }}">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-pages">
          <span>
						<span class="sidebar-icon">
							<i class="icon icon-xs me-2 bi bi bi-graph-up"></i>
						</span>
						<span class="sidebar-text">Analytics</span>
					</span>
					<span class="link-arrow">
						<svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
					</span>
        </span>
        <div class="multi-level collapse {{ request()->routeIs('analytics.*') ? 'show' : '' }}" role="list" id="submenu-pages" aria-expanded="true">
          <ul class="flex-column nav">
            <li class="nav-item {{ (request()->routeIs('analytics.revenues.*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('analytics.revenues.index') }}">
                <span class="sidebar-icon">
									<i class="icon icon-xs me-2 bi bi-cash-coin"></i>
								</span>
								<span class="sidebar-text">Revenue</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->routeIs('analytics.nationalities.*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('analytics.nationalities.index') }}">
                <span class="sidebar-icon">
									<i class="icon icon-xs me-2 bi bi-person-bounding-box"></i>
								</span>
								<span class="sidebar-text">Nationality</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->routeIs('analytics.demographics.*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('analytics.demographics.index') }}">
                <span class="sidebar-icon">
									<i class="icon icon-xs me-2 bi bi-bar-chart-line"></i>
								</span>
								<span class="sidebar-text">Demographic</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->routeIs('analytics.passengers.*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('analytics.passengers.index') }}">
								<span class="sidebar-icon">
									<i class="icon icon-xs me-2 bi bi-person-lines-fill"></i>
								</span>
								<span class="sidebar-text">Passenger</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
			@role('Administrator')
				<li class="nav-item {{ (request()->routeIs('users.*')) ? 'active' : '' }}">
					<a href="{{ route('users.index') }}" class="nav-link">
						<span class="sidebar-icon">
							<i class="icon icon-xs me-2 bi bi-person-circle"></i>
						</span>
						<span class="sidebar-text">User Management</span>
					</a>
				</li>
				<li class="nav-item {{ (request()->routeIs('registrations.*')) ? 'active' : '' }}">
					<a href="{{ route('registrations.index') }}" class="nav-link">
						<span class="sidebar-icon">
							<i class="icon icon-xs me-2 bi bi-r-circle"></i>
						</span>
						<span class="sidebar-text">Registrations</span>
					</a>
				</li>
				<li class="nav-item {{ (request()->routeIs('residents.*')) ? 'active' : '' }}">
					<a href="{{ route('residents.index') }}" class="nav-link">
						<span class="sidebar-icon">
							<i class="icon icon-xs me-2 bi bi-person-lines-fill"></i>
						</span>
						<span class="sidebar-text">Resident Profiling</span>
					</a>
				</li>
				<li class="nav-item {{ (request()->routeIs('bookings.*')) ? 'active' : '' }}">
					<a href="{{ route('bookings.index') }}" class="nav-link">
						<span class="sidebar-icon">
							<i class="icon icon-xs me-2 bi bi-bookmark-heart"></i>
						</span>
						<span class="sidebar-text">Bookings</span>
					</a>
				</li>
				<li class="nav-item {{ (request()->routeIs('payments.*')) ? 'active' : '' }}">
					<a href="{{ route('payments.index') }}" class="nav-link">
						<span class="sidebar-icon">
							<i class="icon icon-xs me-2 bi bi-wallet-fill"></i>
						</span>
						<span class="sidebar-text">Payments</span>
					</a>
				</li>
			@endrole
			<li class="nav-item {{ (request()->routeIs('islets.*')) ? 'active' : '' }}">
				<a href="{{ route('islets.index') }}" class="nav-link">
					<span class="sidebar-icon">
						<i class="icon icon-xs me-2 bi bi-geo-alt-fill"></i>
					</span>
					<span class="sidebar-text">Islet Profile</span>
				</a>
			</li>
			<li class="nav-item {{ (request()->routeIs('pumpboats.*')) ? 'active' : '' }}">
				<a href="{{ route('pumpboats.index') }}" class="nav-link">
					<span class="sidebar-icon">
						<i class="icon icon-xs me-2 bi bi-person-badge"></i>
					</span>
					<span class="sidebar-text">Pumpboat Profile</span>
				</a>
			</li>
			<li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
			<li class="nav-item">
				<a href="{{ url('/') }}" class="nav-link d-flex align-items-center">
					<span class="sidebar-icon">
						<i class="icon icon-xs me-2 bi bi-house"></i>
					</span>
					<span class="sidebar-text">Homepage</span>
				</a>
			</li>
			<li class="nav-item">
				<a target="_blank" href="#"
					class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
					<span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
						<i class="icon icon-xs me-2 bi bi-globe"></i>
					</span>
					<span>ISLET CONNECT</span>
				</a>
			</li>
		</ul>
	</div>
</nav>

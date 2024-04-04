<x-app-layout>

	{{-- For Camera for Smartphone --}}
	{{-- <input
		id="cameraFileInput"
		type="file"
		accept="image/*"
		capture="environment"
	/> --}}

	<div class="row py-4">
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
				<div class="card-body">
					<div class="row d-block d-xl-flex align-items-center">
						<div
							class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
							<div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
									<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
									<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
								</svg>
							</div>
							<div class="d-sm-none">
								<h2 class="h5">Users</h2>
								<h3 class="fw-extrabold mb-1">{{ $totalUsers }}</h3>
							</div>
						</div>
						<div class="col-12 col-xl-7 px-xl-0">
							<div class="d-none d-sm-block">
								<h2 class="h6 text-gray-400 mb-0">Users</h2>
								<h3 class="fw-extrabold mb-2"> {{ $totalUsers }}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
				<div class="card-body">
					<div class="row d-block d-xl-flex align-items-center">
						<div
							class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
							<div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-r-circle" viewBox="0 0 16 16">
									<path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.5 4.002h3.11c1.71 0 2.741.973 2.741 2.46 0 1.138-.667 1.94-1.495 2.24L11.5 12H9.98L8.52 8.924H6.836V12H5.5zm1.335 1.09v2.777h1.549c.995 0 1.573-.463 1.573-1.36 0-.913-.596-1.417-1.537-1.417z"/>
								</svg>
							</div>
							<div class="d-sm-none">
								<h2 class="fw-extrabold h5">Registrations</h2>
								<h3 class="mb-1">{{ $totalRegistrations }}</h3>
							</div>
						</div>
						<div class="col-12 col-xl-7 px-xl-0">
							<div class="d-none d-sm-block">
								<h2 class="h6 text-gray-400 mb-0">Registrations</h2>
								<h3 class="fw-extrabold mb-2">{{ $totalRegistrations }}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
				<div class="card-body">
					<div class="row d-block d-xl-flex align-items-center">
						<div
							class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
							<div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
									<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
								</svg>
							</div>
							<div class="d-sm-none">
								<h2 class="fw-extrabold h5"> Residents</h2>
								<h3 class="mb-1">{{ $totalResidents }}</h3>
							</div>
						</div>
						<div class="col-12 col-xl-7 px-xl-0">
							<div class="d-none d-sm-block">
								<h2 class="h6 text-gray-400 mb-0"> Residents</h2>
								<h3 class="fw-extrabold mb-2">{{ $totalResidents }}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
				<div class="card-body">
					<div class="row d-block d-xl-flex align-items-center">
						<div
							class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
							<div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bookmark-heart" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
									<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
								</svg>
							</div>
							<div class="d-sm-none">
								<h2 class="fw-extrabold h5">Bookings</h2>
								<h3 class="mb-1">{{ $totalBookings }}</h3>
							</div>
						</div>
						<div class="col-12 col-xl-7 px-xl-0">
							<div class="d-none d-sm-block">
								<h2 class="h6 text-gray-400 mb-0">Bookings</h2>
								<h3 class="fw-extrabold mb-2">{{ $totalBookings }}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
				<div class="card-body">
					<div class="row d-block d-xl-flex align-items-center">
						<div
							class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
							<div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-wallet-fill" viewBox="0 0 16 16">
									<path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2z"/>
									<path d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5z"/>
								</svg>
							</div>
							<div class="d-sm-none">
								<h2 class="fw-extrabold h5">Payment</h2>
								<h3 class="mb-1">{{ $totalPayments }}</h3>
							</div>
						</div>
						<div class="col-12 col-xl-7 px-xl-0">
							<div class="d-none d-sm-block">
								<h2 class="h6 text-gray-400 mb-0">Payment</h2>
								<h3 class="fw-extrabold mb-2">{{ $totalPayments }}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
				<div class="card-body">
					<div class="row d-block d-xl-flex align-items-center">
						<div
							class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
							<div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
									<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
								</svg>
							</div>
							<div class="d-sm-none">
								<h2 class="fw-extrabold h5">Islet</h2>
								<h3 class="mb-1">{{ $totalIslets }}</h3>
							</div>
						</div>
						<div class="col-12 col-xl-7 px-xl-0">
							<div class="d-none d-sm-block">
								<h2 class="h6 text-gray-400 mb-0">Islet</h2>
								<h3 class="fw-extrabold mb-2">{{ $totalIslets }}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
			<div class="card border-0 shadow">
				<div class="card-body">
					<div class="row d-block d-xl-flex align-items-center">
						<div
							class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
							<div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
									<path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
									<path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
								</svg>
							</div>
							<div class="d-sm-none">
								<h2 class="fw-extrabold h5">Pumpboat</h2>
								<h3 class="mb-1">{{ $totalPumpboats }}</h3>
							</div>
						</div>
						<div class="col-12 col-xl-7 px-xl-0">
							<div class="d-none d-sm-block">
								<h2 class="h6 text-gray-400 mb-0">Pumpboat</h2>
								<h3 class="fw-extrabold mb-2">{{ $totalPumpboats }}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-app-layout>

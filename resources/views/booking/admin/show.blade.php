<x-app-layout>
	

	<div class="col-12 mt-1 mb-6">

		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
			<div class="d-block mb-md-0">
				<h2 class="h4">Booking Details</h2>
			</div>
		</div>

		<div class="card border-0 shadow rounded mb-4">
			<div class="card-header border-bottom d-flex align-items-center justify-content-between">
				<h2 class="fs-5 mb-0">Schedule</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-xl-12">
						<ul class="list-group list-group-flush">
							<li class="list-group-item align-items-center justify-content-between px-0 border-bottom">
								<div class="row">
									<div class="col-md-4">
										<div>
											<h3 class="h6 mb-1">Booking Date</h3>
											<p class="small pe-4">{{ $scheduleDateFrom->format('Y-m-d') }} - {{ $scheduleDateTo->format('Y-m-d') }}</p>
										</div>
									</div>
									<div class="col-md-4">
										<div>
											<h3 class="h6 mb-1">Total day/s</h3>
											<p class="small pe-4">{{ $numberOfDays }}</p>
										</div>
									</div>
									<div class="col-md-4">
										<div>
											<h3 class="h6 mb-1">Total Passenger/s</h3>
											<p class="small pe-4">{{ $passengerCount }}</p>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="card border-0 shadow rounded mb-4">
			<div class="card-header border-bottom d-flex align-items-center justify-content-between">
				<h2 class="fs-5 mb-0">Islet/s</h2>
			</div>
			<div class="card-body">
				<div class="row">
					@foreach ($islets as $islet)
					@php
					$isletCoverPhoto = $islet->getMedia('cover_photos')[0];
					@endphp
					<div class="col-md-4">
						<div class="card shadow border-0 text-center p-0">
							<div class="profile-cover rounded-top" style="background: url({{ $isletCoverPhoto->getUrl() }})">
							</div>
							<div class="card-body">
								<p class="text-gray mb-4">{{ $islet->name }}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>

		<div class="card border-0 shadow rounded mb-4">
			<div class="card-header border-bottom d-flex align-items-center justify-content-between">
				<h2 class="fs-5 mb-0">Pumpboat</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-xl-7 text-center">
						<div class="text-center h-75 my-0 my-md-4">
							@php
							$pumpboatCoverPhoto = $pumpboat->getMedia('cover_photos')[0];
							@endphp
							<img class="text-center w-75 h-75" src="{{ $pumpboatCoverPhoto->getUrl() }}" alt="">
							<p class="text-center">{{ $pumpboat->name }}</p>
						</div>
					</div>
					<div class="col-md-12 col-xl-5">
						<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
								<div>
									<h3 class="h6 mb-1">Owner | Captain</h3>
									<p class="small pe-4">{{ $pumpboat->pumpboatOwner->first_name }}
										{{ $pumpboat->pumpboatOwner->last_name }} | {{ $pumpboat->pumpboatCaptain->first_name }}
										{{ $pumpboat->pumpboatCaptain->last_name }}</p>
								</div>
							</li>
							<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
								<div>
									<h3 class="h6 mb-1">Contact Details</h3>
									<p class="small pe-4">{{ $pumpboat->pumpboatOwner->contact_number }} |
										{{ $pumpboat->pumpboatOwner->email }}</p>
								</div>
							</li>
							<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
								<div>
									<h3 class="h6 mb-1">Total Passenger Capacity</h3>
									<p class="small pe-4">{{ $pumpboat->total_passenger_capacity }}</p>
								</div>
							</li>
							<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
								<div>
									<h3 class="h6 mb-1">Registration Number</h3>
									<p class="small pe-4">{{ $pumpboat->reg_number }}</p>
								</div>
							</li>
							<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
								<div>
									<h3 class="h6 mb-1">Hull Material</h3>
									<p class="small pe-4">{{ $pumpboat->hull_material }}</p>
								</div>
							</li>
							<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
								<div>
									<h3 class="h6 mb-1">Safety Equipment</h3>
									<p class="small pe-4">{{ $pumpboat->safety_equipment }}</p>
								</div>
							</li>
							<li class="list-group-item d-flex align-items-center justify-content-between px-0">
								<div>
									<h3 class="h6 mb-1">Amenities</h3>
									<p class="small pe-4">{{ $pumpboat->amenities }}</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="card border-0 shadow rounded mb-4">
			<div class="card-header border-bottom d-flex align-items-center justify-content-between">
				<h2 class="fs-5 mb-0">Passenger/s</h2>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-centered table-nowrap mb-7 rounded border">
						<thead class="thead-light">
							<tr>
								<th class="border-0 rounded-start">Name</th>
								<th class="border-0">Age</th>
								<th class="border-0">Sex</th>
								<th class="border-0">Nationality</th>
								<th class="border-0 rounded-end">PWD</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($booking->bookingPassengers as $passenger)
							<tr>
								<td class="small">
									{{ $passenger->name }}
								</td>
								<td class="small">
									{{ $passenger->age }}
								</td>
								<td class="small">
									{{ $passenger->sex }}
								</td>
								<td class="small">
									{{ $passenger->nationality }}
								</td>
								<td class="small">
									{{ $passenger->pwd ? 'Yes' : 'No' }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div>
			<a href="{{ route('bookings.index') }}" class="btn btn-gray-800" type="button">Back</a>
		</div>
	</div>
	
</x-app-layout>

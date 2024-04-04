<div>

	<div class="col-12 d-flex align-items-center justify-content-center">
		<div class="bg-gray-100 shadow border-0 rounded border-light p-4 p-lg-5 w-100">
				@include('components.booking-wizard-navigation')
			<div class="text-center text-md-center mb-4 mt-md-0">
				<h1 class="mb-0 h3">Booking Summary</h1>
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
												<p class="small pe-4">{{ $schedule['from_date'] }} - {{ $schedule['to_date'] }}</p>
											</div>
										</div>
										<div class="col-md-4">
											<div>
												<h3 class="h6 mb-1">Total day/s</h3>
												<p class="small pe-4">{{ $schedule['total_days'] }}</p>
											</div>
										</div>
										<div class="col-md-4">
											<div>
												<h3 class="h6 mb-1">Total Passenger/s</h3>
												<p class="small pe-4">{{ count($passengers) }}</p>
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
						@foreach ($islets as $islet	)
							@php
								$isletCoverPhoto = $islet->getMedia('cover_photos')[0];
							@endphp
							<div class="col-md-4">
								<div class="card shadow border-0 text-center p-0">
									<div class="profile-cover rounded-top" style="background: url({{ $isletCoverPhoto->getUrl() }})"></div>
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
								<img src="{{ $pumpboatCoverPhoto->getUrl() }}" class="text-center w-75 h-75" alt="">
								<p class="text-center">{{ $pumpboat->name }}</p>
							</div>
						</div>
						<div class="col-md-12 col-xl-5">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
									<div>
										<h3 class="h6 mb-1">Owner | Captain</h3>
										<p class="small pe-4">{{ $pumpboat->pumpboatOwner['first_name'] }} {{ $pumpboat->pumpboatOwner['last_name'] }} | {{ $pumpboat->pumpboatCaptain['first_name'] }} {{ $pumpboat->pumpboatCaptain['last_name'] }}</p>
									</div>
								</li>
								<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
									<div>
										<h3 class="h6 mb-1">Contact Details</h3>
										<p class="small pe-4">{{ $pumpboat->pumpboatOwner->contact_number }} | {{ $pumpboat->pumpboatOwner->email }}</p>
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
									<th class="border-0">Address</th>
									<th class="border-0 rounded-end">PWD</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($passengers as $passenger)
									<tr>
										<td>
											<a class="small fw-bold">{{ $passenger['name'] }}</a>
										</td>
										<td>
											<a class="small fw-bold">{{ $passenger['age'] }}</a>
										</td>
										<td>
											<a class="small fw-bold">{{ $passenger['sex'] }}</a>
										</td>
										<td>
											<a class="small fw-bold">{{ $passenger['nationality'] }}</a>
										</td>
										<td>
											<a class="small fw-bold">{{ $passenger['address'] }}</a>
										</td>
										<td>
											<a class="small fw-bold">{{ ($passenger['pwd']) ? 'Yes' : 'No' }}</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="card border-0 shadow rounded mb-4">
				<div class="card-header border-bottom d-flex align-items-center justify-content-between">
					<h2 class="fs-5 mb-0">Contact Information</h2>
				</div>
				<div class="card-body">
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" type="text" name="name" wire:model="name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control" type="email" name="email" wire:model="email" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input class="form-control" type="text" name="phone" wire:model="phone" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Address</label>
								<input class="form-control" type="text" name="address" wire:model="address" required>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div>
				<button type="button" class="btn-previous" wire:click="previousStep">Previous</button>
				<button type="button" class="btn-submit" data-bs-toggle="modal" data-bs-target="#bookingConfirmationModal">Submit</button>
			</div>

		</div>
	</div>

	{{-- Submit modal --}}
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="bookingConfirmationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title">Booking Confirmation</h5>
					<span class="pull-right" wire:loading>
						<i class="fas fa-spinner fa-spin"></i>
					</span>
				</div>
				<div class="modal-body">
					<p>Finalize Booking?</p>
				</div>
				<div class="modal-footer">
					<button type="button" data-bs-dismiss="modal" class="btn-close-summary-modal" wire:loading.remove> No </button>
					<button wire:loading.remove type="button" class="btn-submit" wire:click="confirm"> Yes </button>
					<button wire:loading type="button" class="btn-submit"><i class="far fa-check-square"></i> Saving booking... </button>
				</div>
      </div>
    </div>
  </div>

</div>

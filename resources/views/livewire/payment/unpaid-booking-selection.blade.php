<div>
	<div class="row mb-4">
    <div class="col-md-4">
			<div class="card border-0 shadow">
				<div class="card-body">
					<label for="searchBooking">Select Booking</label>
					<input type="text" class="form-control mb-2" id="searchBooking" wire:model.live.debounce.250ms="searchBooking" placeholder="Search booking...">
					<ul class="list-group list-group-flush list my--3">

						@forelse ($bookings as $booking)
							<li class="list-group-item px-0">
								<div class="row align-items-center">
									<div class="col-auto ms--2">
										<h4 class="h6 mb-0">
											{{ $booking->code }}
										</h4>
									</div>
									<div class="col text-end">
										<button class="btn btn-sm btn-secondary d-inline-flex align-items-center" wire:click="selectBooking('{{ $booking->id }}')">
											<svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
											Select
										</button>
									</div>
								</div>
							</li>
						@empty
							<li class="list-group-item px-0">
								<div class="row align-items-center">
									<div class="">
										<h4 class="h6 mb-0 text-center">
											No data.
										</h4>
									</div>
								</div>
							</li>
						@endforelse

					</ul>
					<a href="{{ route('payments.index') }}" class="btn btn-gray-800 mt-2 animate-up-2">Back</a>
				</div>
			</div>
		</div>
		<div class="col-md-8 mt-2 mt-md-0 mb-2">
			@if ( isset($selectedBooking) )
				<div class="card card-body border-0 shadow mb-xl-3">
					<h3 class="h4">Booking Details</h3>
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
							<div>
								<h3 class="h6 mb-1">Booking Code:</h3>
								<p class="small pe-4">{{ $selectedBooking['code'] }}</p>
							</div>
						</li>
						<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
							<div>
								<h3 class="h6 mb-1">Schedule</h3>
								<p class="small pe-4">{{ $selectedBooking['scheduled_date_to']->format('Y-m-d') }} to {{ $selectedBooking['scheduled_date_to']->format('Y-m-d') }}</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="card card-body border-0 shadow mb-xl-0">
					<h3 class="h4">Payment Details</h3>
					<form wire:submit="store" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="or_number">OR Number <x-asterisks /></label>
									<input type="text" class="form-control" id="or_number" wire:model="or_number" required/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="amount">Amount <x-asterisks /></label>
									<input type="number" class="form-control" id="amount" wire:model="amount" required/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="payment_date">Payment Date<x-asterisks /></label>
									<input type="date" class="form-control" id="payment_date" wire:model.live="payment_date" required/>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save</button>
					</form>
				</div>

			@endif
		</div>
  </div>
	@push('scripts')
		<script nonce="{{ csp_nonce() }}">

			window.addEventListener('alert', event => {
				toast.fire({
					icon: event.detail.type,
					title: event.detail.message ?? '',
				});
			});

			window.addEventListener('redirect', event => {
				window.setTimeout(function() {
					window.location.href = event.detail.url;
				}, event.detail.milliseconds);
			});

		</script>
	@endpush
</div>




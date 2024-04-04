<div>
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
      <div class="text-center text-md-center mb-4 mt-md-0">
        <h1 class="mb-0">Schedule</h1>
      </div>

      <div class="row">
				<div class="col-md-6">
					<label for="from_date">From:</label>
					<div class="input-group">
						<span class="input-group-text">
							<img src="{{ asset('img/register/calendar-icon.svg') }}" class="icon icon-xs" alt="">
						</span>
						<input class="form-control datepicker-input id="from_date"
							type="date" placeholder="yyyy-mm-dd" name="from_date"
							wire:model.live="from_date" min="{{ $min_date }}" max="{{ $to_date }}" required>
					</div>
				</div>

				<div class="col-md-6">
					<label for="to_date">To:</label>
					<div class="input-group">
						<span class="input-group-text">
							<img src="{{ asset('img/register/calendar-icon.svg') }}" class="icon icon-xs" alt="">

						</span>
						<input class="form-control datepicker-input id="to_date"
							type="date" placeholder="yyyy-mm-dd" name="to_date"
							wire:model.live="to_date" min="{{ $from_date }}" max="{{ $max_date }}" required>
					</div>
				</div>

				@if ($from_date != null && $to_date != null)
					<div class="table-responsive">
						<table class="table table-centered table-nowrap mt-5 rounded">
							<thead class="thead-light">
								<tr>
									<th class="border-0 rounded-start">FROM</th>
									<th class="border-0">TO</th>
									<th class="border-0 rounded-end"># of Day/s</th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td>
											<a class="small fw-bold">{{ $from_date }}</a>
										</td>
										<td>
											<a class="small fw-bold">{{ $to_date }}</a>
										</td>
										<td>
											<a class="small fw-bold">{{ $total_days }} day/s</a>
										</td>
									</tr>
							</tbody>
						</table>
					</div>

					<div class="mt-3">
						<button type="button" class="btn-next" wire:click="nextStep">Next</button>
					</div>

				@endif

			</div>

    </div>
  </div>

  @push('scripts')
		<script nonce="{{ csp_nonce() }}">

			window.addEventListener('open-passenger-form-modal', event => {
				$('#passengerFormModal').modal('show');
			});

			window.addEventListener('close-passenger-form-modal', event => {
				$('#passengerFormModal').modal('hide');
			});

			window.addEventListener('open-passenger-delete-modal', event => {
				$('#passengerDeleteModal').modal('show');
			});

			window.addEventListener('close-passenger-delete-modal', event => {
				$('#passengerDeleteModal').modal('hide');
			});

			window.addEventListener('close-booking-confirmation-modal', event => {
				$('#bookingConfirmationModal').modal('hide');
			});


			window.addEventListener('alert', event => {
				toast.fire({
					icon: event.detail.type,
					title: event.detail.message ?? '',
				});
			});

			window.addEventListener('swal', event => {
				Swal.fire({
					allowOutsideClick: false,
					title: event.detail.title ?? '',
					text: event.detail.text ?? '',
					icon: event.detail.type,
				})
				.then((result) => {
					if (result.isConfirmed) {
						window.location.href = event.detail.url
					}
				});
			});

		</script>
  @endpush
</div>

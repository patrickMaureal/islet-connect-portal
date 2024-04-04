<div>
  <div class="card border-0 shadow rounded mb-4">
		<div class="card-header border-bottom d-flex align-items-center justify-content-between">
			<h2 class="fs-5 mb-0">Passenger/s</h2>
			@if ($booking->bookingPassengers->count() < $pumpboat->total_passenger_capacity)
				<button type="button" class="btn btn-sm btn-primary" wire:click="add">Add Entry</button>
			@endif
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
							<th class="border-0">PWD</th>
							<th class="border-0 rounded-end">Actions</th>
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
								{{ $passenger->address }}
							</td>
							<td class="small">
								{{ $passenger->pwd ? 'Yes' : 'No' }}
							</td>
							<td>
								<div class="btn-group">
									<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
										data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="bi bi-three-dots-vertical"></span>
										<span class="visually-hidden">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu py-2">
										<button type="button" class="dropdown-item fw-bold" wire:click="edit('{{ $passenger->id }}')">Update</button>
										<button type="button" class="dropdown-item text-danger rounded-bottom fw-bold" wire:click="delete('{{ $passenger->id }}')">Delete</button>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	{{-- form --}}
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="addPassengerModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<livewire:booking.passenger.passenger-form :booking="$booking"/>
			</div>
		</div>
	</div>

	{{-- delete modal --}}
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="passengerDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Delete Confirmation</h5>
					<span class="pull-right" wire:loading>
						<img src="{{ asset('img/spinner.gif') }}">
					</span>
				</div>
				<div class="modal-body" >
					<p>Delete Passenger?</p>
				</div>
				<div class="modal-footer">
					<button type="button" id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i class="fas fa-window-close"></i> Close </button>
					<button type="button" wire:click="destroy" id="destroy-passenger" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete </button>
				</div>
			</div>
		</div>
	</div>

	@push('scripts')
		<script nonce="{{ csp_nonce() }}">

			window.addEventListener('close-form-modal', event => {
				$('#addPassengerModal').modal('hide');
			});

			window.addEventListener('open-form-modal', event => {
				$('#addPassengerModal').modal('show');
			});

			window.addEventListener('open-delete-modal', event => {
				$('#passengerDeleteModal').modal('show');
			});

			window.addEventListener('close-delete-modal', event => {
				$('#passengerDeleteModal').modal('hide');
			});

			window.addEventListener('alert', event => {
				toast.fire({
					icon: event.detail.type,
					title: event.detail.message ?? '',
				});
			});
		</script>
	@endpush
</div>

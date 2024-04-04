<div> 

	<div class="card border-0 shadow mb-4">
		<div class="card-header border-bottom d-flex align-items-center justify-content-between">
			<h3 class="fs-5 fw-bold mb-0">Islet Activities</h3>
			<button type="button" class="btn btn-sm btn-primary" wire:click="add">Add Entry</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-centered table-nowrap mb-7 rounded">
					<thead class="thead-light">
						<tr>
							<th class="border-0 rounded-start">#</th>
							<th class="border-0">Activity</th>
							<th class="border-0">Description</th>
							<th class="border-0 rounded-end">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($islet->activities as $activity)
							<tr>
								<td>
									<span class="small fw-bold">{{ $loop->iteration }}</span>
								</td>
								<td>
									<a class="small fw-bold" href="#">{{ $activity->activity }}</a>
								</td>
								<td>
									<a class="small fw-bold" href="#">{{ $activity->description}}</a>
								</td>
								<td>
									
									<div class="btn-group">
										<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
											data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="bi bi-three-dots-vertical"></span>
											<span class="visually-hidden">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu py-2">
											<a href="{{ route('islets.activities.attachments',[$islet->id,$activity->id]) }}" class="dropdown-item rounded-top fw-bold">Attachments</a>
											<button type="button" class="dropdown-item fw-bold" wire:click="edit('{{ $activity->id }}')">Update</button>
											<button type="button" class="dropdown-item text-danger rounded-bottom fw-bold" wire:click="delete('{{ $activity->id }}')">Delete</button>
									</div>
								</td>
							</tr>
						@empty
							<tr class="text-center">
								<td colspan="4">No record.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>

	{{-- form modal --}}
	<div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<livewire:islet.activity.activity-form :islet="$islet" />
			</div>
		</div>
	</div>

	{{-- delete modal --}}
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="activityDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Delete Confirmation</h5>
					<span class="pull-right" wire:loading>
						<img src="{{ asset('img/spinner.gif') }}">
					</span>
				</div>
				<div class="modal-body" >
					<p>Delete islet activity?</p>
				</div>
				<div class="modal-footer">
					<button type="button" id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i class="fas fa-window-close"></i> Close </button>
					<button type="button" wire:click="destroy" id="destroy-islet-activity" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete </button>
				</div>
			</div>
		</div>
	</div>
	
	@push('scripts')
		<script nonce="{{ csp_nonce() }}">

			window.addEventListener('close-form-modal', event => {
				$('#activityModal').modal('hide');
			});

			window.addEventListener('open-form-modal', event => {
				$('#activityModal').modal('show');
			});

			window.addEventListener('open-delete-modal', event => {
				$('#activityDeleteModal').modal('show');
			});

			window.addEventListener('close-delete-modal', event => {
				$('#activityDeleteModal').modal('hide');
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

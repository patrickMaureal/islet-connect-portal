<div>

  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
      <div class="text-center text-md-center mb-4 mt-md-0">
        <h1 class="mb-0 h3">Passenger Profiling</h1>
      </div>

			<button type="button" class="btn-add" wire:click="add"> Add Passenger</button>

					<p class="mb-4">Total Passengers: {{ count($passengers) }}</p>
          <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-7 rounded">
              <thead class="thead-light">
                <tr class="text-center">
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
                @forelse ($passengers as $passenger)
                  <tr class="text-center">
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
                    <td>
                      <div class="btn-group">
                        <button class="btn-dropdown btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="fa-solid fa-ellipsis-vertical"></span>
                          <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu py-2">
                          <button type="button" class="dropdown-item fw-bold" wire:click="edit('{{ $passenger['id'] }}')">Edit</button>
                          <button type="button" class="dropdown-item text-danger rounded-bottom fw-bold" wire:click="delete('{{ $passenger['id'] }}')">Delete</button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr class="text-center">
                    <td colspan="6">No record.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

      <div class="mt-5">
        <button type="button" class="btn-previous" wire:click="previousStep">Previous</button>
        @if ( (count($passengers) > 0) )
          <button type="button" class="btn-next" wire:click="nextStep">Next</button>
        @endif
      </div>

    </div>
  </div>

  {{-- form --}}
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="passengerFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
					<h5 class="modal-title">Passenger Information</h5>
        </div>
        <form wire:submit="{{ ($id) ? 'update' : 'store' }}">

          <div class="modal-body">

            <div class="form-group mb-3">
              <label for="name">Name <x-asterisks /></label>
              <input type="text" class="form-control" id="name" wire:model="name" required/>
            </div>

            <div class="form-group mb-3">
              <label for="age">Age <x-asterisks /></label>
              <input type="number" class="form-control" id="age" wire:model="age" required />
            </div>

            <div class="form-group mb-3">
              <label class="my-1 me-2" for="sex">Sex <x-asterisks /></label>
              <select class="form-select" wire:model="sex" id="sex" aria-label="Sex" required>
                <option value="">Select Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

						<div class="form-group mb-3">
							<label for="countries">Country <x-asterisks /></label>
								<select class="form-select" wire:model="nationality" id="nationality" name="nationality" aria-label="Country" data-live-search="true" title="Choose Country" required>
									<option value="">Select Nationality</option>
									@foreach (config('constants.countries') as $nationality)
                  <option value="{{ $nationality }}" {{ old('nationality')==$nationality ? 'selected' : '' }}>
                    {{ $nationality }}</option>
                  @endforeach
								</select>
						</div>

						<div class="form-group mb-3">
              <label for="address">Address <x-asterisks /></label>
              <input type="text" class="form-control" id="address" wire:model="address" required/>
            </div>

						<div class="form-group mb-3">
							<label for="pwd">PWD <x-asterisks /></label>
							<select wire:model="pwd" id="pwd" class="form-select">
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
						</div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn-close-modal" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn-save-modal">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>

	{{-- delete modal --}}
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="passengerDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Delete Confirmation</h5>
					<span class="pull-right" wire:loading>
						<img src="{{ asset('img/spinner.gif') }}">
					</span>
				</div>
				<div class="modal-body" >
					<p>Delete passenger?</p>
				</div>
				<div class="modal-footer">
					<button type="button" id="close-button" data-bs-dismiss="modal" class="btn-close-modal">Close </button>
					<button type="button" wire:click="destroy" class="btn-delete"></i> Delete </button>
				</div>
			</div>
		</div>
	</div>

</div>

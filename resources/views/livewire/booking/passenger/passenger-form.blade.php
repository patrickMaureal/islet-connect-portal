<div>
  <div class="modal-header">
		<h5 class="modal-title">Passenger Information</h5>
	</div>
	<form wire:submit="{{ ($bookingPassenger) ? 'update' : 'store' }}">
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
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>

			<div class="form-group mb-3">
				<label for="countries">Country <x-asterisks /></label>
				<select class="form-select" wire:model="nationality" id="nationality" name="nationality" aria-label="Country" data-live-search="true" title="Choose Country" required>
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
			<button type="button" class="btn btn-link text-gray-600 ms-auto" wire:click="close">
				Close
			</button>
			<button type="submit" class="btn btn-secondary">Save</button>
		</div>

	</form>
</div>


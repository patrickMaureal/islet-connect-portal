<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Add Pumpboat</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-12">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Pumpboat information</h2>

				<form method="POST" action="{{ route('pumpboats.store') }}" enctype="multipart/form-data">
					@csrf

					<div class="row mb-2 py-2">
						<div class="col-md-12">
							<div class="form-group">
								<label for="name">Name <x-asterisks /> </label>
								<input class="form-control @error('name') is-invalid @enderror" id="name"
									name="name" type="text" placeholder="Name" value="{{ old('name') }}"
									required>
								@error('name')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
					</div>

					<div class="row mb-2 py-2">
						<div class="col-md-6">
							<div class="form-group">
								<label for="owner">Owner <x-asterisks /></label>
								<select name="owner" id="owner" class="form-control form-select selectpicker @error('owner') is-invalid @enderror" title="Choose Owner" data-live-search="true" title="Choose Owner" required>
									@foreach ($residents as $owner)
										<option value="{{ $owner->id }}">{{ $owner->first_name }} {{ $owner->last_name }}</option>
									@endforeach
								</select>
								@error('owner')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="captain">Captain <x-asterisks />	</label>
								<select name="captain" id="captain" class="form-control form-select selectpicker @error('captain') is-invalid @enderror" title="Choose Captain" data-live-search="true" title="Choose Captain" required>
									@foreach ($residents as $captain)
										<option value="{{ $captain->id }}">{{ $captain->first_name }} {{ $captain->last_name }}</option>
									@endforeach
								</select>
								@error('captain')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
					</div>

					<div class="row mb-2 py-2">
						<div class="col-md-4">
							<div class="form-group">
								<label for="total_passenger_capacity">Total Passenger Capacity <x-asterisks /></label>
								<input class="form-control @error('total_passenger_capacity') is-invalid @enderror" id="total_passenger_capacity" name="total_passenger_capacity" type="number" placeholder="Total Passenger Capacity" value="{{ old('total_passenger_capacity') }}">
								@error('total_passenger_capacity')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="reg_number">Registration Number <x-asterisks /></label>
								<input class="form-control @error('reg_number') is-invalid @enderror" id="reg_number"
									name="reg_number" type="text" placeholder="Registration Number"
									value="{{ old('reg_number') }}">
								@error('reg_number')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="description">Description <x-asterisks /> </label>
								<input class="form-control @error('description') is-invalid @enderror" id="description"
									name="description" type="text" placeholder="Description"
									value="{{ old('description') }}">
								@error('description')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
					</div>

					<div class="row mb-2 py-2">
						<div class="col-md-4">
							<div class="form-group">
								<label for="dimension_width">Dimension Width <x-asterisks /> </label>
								<input class="form-control @error('dimension_width') is-invalid @enderror"
									id="dimension_width" name="dimension_width" type="text"
									placeholder="Dimension Width" value="{{ old('dimension_width') }}">
								@error('dimension_width')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="dimension_length">Dimension Length <x-asterisks /> </label>
								<input class="form-control @error('dimension_length') is-invalid @enderror"
									id="dimension_length" name="dimension_length" type="text"
									placeholder="Dimension Length" value="{{ old('dimension_length') }}">
								@error('dimension_length')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="dimension_depth">Dimension Depth <x-asterisks /></label>
								<input class="form-control @error('dimension_depth') is-invalid @enderror"
									id="dimension_depth" name="dimension_depth" type="text"
									placeholder="Dimension Depth" value="{{ old('dimension_depth') }}">
								@error('dimension_depth')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
					</div>

					<div class="row mb-2 py-2">
						<div class="col-md-6">
							<div class="form-group">
								<label for="fuel_type">Fuel Type <x-asterisks /> </label>
								<input class="form-control @error('fuel_type') is-invalid @enderror" id="fuel_type" name="fuel_type" type="text" placeholder="Fuel Type" value="{{ old('fuel_type') }}" required>
								@error('fuel_type')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-6">
						  <div class="form-group">
							  <label for="hull_material">Hull Material <x-asterisks /> </label>
									<select class="form-control form-select selectpicker @error('hull_material') is-invalid @enderror" id="hull_material" name="hull_material[]" aria-label="Hull Material" data-live-search="true" title="Choose Hull Material" multiple required>
										@foreach (config('constants.hull_material') as $hull_material)
											<option value="{{ $hull_material }}" {{ in_array($hull_material, old('hull_material') ? : []) ? 'selected' : '' }}> {{ $hull_material }}</option>
										@endforeach
									</select>
									@error('hull_material')
										<x-input-error message="{{ $message }}" />
									@enderror
						  </div>
					  	</div>
					</div>

					<div class="row mb-2 py-2">
						<div class="col-md-6">
							<div class="form-group">
								<label for="safety_equipment">Safety Equipment <x-asterisks /> </label>
									<select class="form-control form-select selectpicker @error('safety_equipment') is-invalid @enderror" id="safety_equipment" name="safety_equipment[]" aria-label="Safety Equipment" data-live-search="true" title="Choose Safety Equipment" multiple required>
										@foreach (config('constants.safety_equipment') as $safety_equipment)
											<option value="{{ $safety_equipment }}" {{ in_array($safety_equipment, old('safety_equipment') ? : []) ? 'selected' : '' }}> {{ $safety_equipment }}</option>
										@endforeach
									</select>
									@error('safety_equipment')
										<x-input-error message="{{ $message }}" />
									@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="amenities">Pumpboat Amenities <x-asterisks /></label>
									<select class="form-control form-select selectpicker @error('amenities') is-invalid @enderror" id="amenities" name="amenities[]" aria-label="Amenities" data-live-search="true" title="Choose Amenities" multiple required>
										@foreach (config('constants.amenities') as $amenities)
											<option value="{{ $amenities }}" {{ in_array($amenities, old('amenities') ? : []) ? 'selected' : '' }}> {{ $amenities }}</option>
										@endforeach
									</select>
									@error('amenities')
										<x-input-error message="{{ $message }}" />
									@enderror
							</div>
						</div>
					</div>

					<div class="row mb-2 py-2">
						<div class="col-md-12">
							<div class="form-group">
								<label for="file">Upload attachments:
									<x-asterisks />
								</label>
								<input class="form-control  @error('file') is-invalid @enderror" id="file"
									name="file[]" multiple type="file" placeholder="File" required>
								@error('file')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
					</div>

					<div class="row mb-2 py-2">
						<div class="col-md-12">
							<div class="form-group">
								<label for="file">Upload cover photo:
									<x-asterisks />
								</label>
								<input class="form-control  @error('cover_photo') is-invalid @enderror" id="cover_photo"
									name="cover_photo" type="file" placeholder="Cover Photo" required>
								@error('cover_photo')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
					</div>


					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
						<a href="{{ route('pumpboats.index') }}" button class="btn btn-gray-800 mt-2 animate-up-2"
							type="submit">Back</button></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>

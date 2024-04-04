<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Update Pumpboat</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-12">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Pumpboat Information</h2>

				<form method="POST" action="{{ route('pumpboats.update', $pumpboat) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="row mb-2 py-2">
						<div class="col-md-12">
							<div class="form-group">
								<label for="name">Name <x-asterisks /> </label>
								<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Name" value="{{ old('name', $pumpboat->name) }}" required>
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
											<option value="{{ $owner->id }}" {{ ( old('owner', $pumpboat->owner) == $owner->id ) ? 'selected' : '' }}>{{ $owner->first_name }} {{ $owner->last_name }}</option>
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
										<option value="{{ $captain->id }}" {{ ( old('captain', $pumpboat->captain) == $captain->id ) ? 'selected' : '' }}>{{ $captain->first_name }} {{ $captain->last_name }}</option>
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
								<input class="form-control @error('total_passenger_capacity') is-invalid @enderror" id="total_passenger_capacity" name="total_passenger_capacity" type="number" placeholder="Total Passenger Capacity" value="{{ old('total_passenger_capacity', $pumpboat->total_passenger_capacity) }}">
								@error('total_passenger_capacity')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="reg_number">Registration Number <x-asterisks /></label>
								<input class="form-control @error('reg_number') is-invalid @enderror" id="reg_number" name="reg_number" type="text" placeholder="Registration Number" value="{{ old('reg_number', $pumpboat->reg_number) }}">
								@error('reg_number')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="description">Description <x-asterisks /> </label>
								<input class="form-control @error('description') is-invalid @enderror" id="description" name="description" type="text" placeholder="Description" value="{{ old('description', $pumpboat->description) }}">
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
								<input class="form-control @error('dimension_width') is-invalid @enderror" id="dimension_width" name="dimension_width" type="text" placeholder="Dimension Width" value="{{ old('dimension_width', $pumpboat->dimension_width) }}">
								@error('dimension_width')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="dimension_length">Dimension Length <x-asterisks /> </label>
								<input class="form-control @error('dimension_length') is-invalid @enderror" id="dimension_length" name="dimension_length" type="text" placeholder="Dimension Length" value="{{ old('dimension_length', $pumpboat->dimension_length) }}">
								@error('dimension_length')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="dimension_depth">Dimension Depth <x-asterisks /></label>
								<input class="form-control @error('dimension_depth') is-invalid @enderror" id="dimension_depth" name="dimension_depth" type="text" placeholder="Dimension Depth" value="{{ old('dimension_depth', $pumpboat->dimension_depth) }}">
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
								<input class="form-control @error('fuel_type') is-invalid @enderror" id="fuel_type" name="fuel_type" type="text" placeholder="Fuel Type" value="{{ old('fuel_type', $pumpboat->fuel_type) }}" >
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
											<option value="{{ $hull_material }}"{{ in_array($hull_material, $hullMaterials) ? 'selected' : ''  }} {{ in_array($hull_material, old('hull_material') ? : []) ? 'selected' : '' }}> {{ $hull_material }}</option>
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
											<option value="{{ $safety_equipment }}"{{ in_array($safety_equipment, $safetyEquipment) ? 'selected' : ''  }} {{ in_array($safety_equipment, old('safety_equipment') ? : []) ? 'selected' : '' }}> {{ $safety_equipment }}</option>
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
											<option value="{{ $amenities }}"{{ in_array($amenities, $pumpboatAmenities) ? 'selected' : ''  }} {{ in_array($amenities, old('amenities') ? : []) ? 'selected' : '' }}> {{ $amenities }}</option>
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
								</label>
								<input class="form-control  @error('file') is-invalid @enderror" id="file"
									name="file[]" multiple type="file" placeholder="File">
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
								</label>
								<input class="form-control  @error('cover_photo') is-invalid @enderror" id="cover_photo"
									name="cover_photo" type="file" placeholder="Cover Photo">
								@error('cover_photo')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update</button>
						<a href="{{ route('pumpboats.index') }}" button class="btn btn-gray-800 mt-2 animate-up-2"
							type="submit">Back</button></a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-12">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Pumpboat Routes</h2>

				<form method="POST" action="{{ route('pumpboats.routes', $pumpboat) }}" >
					@csrf
					@method('PUT')

					<div class="row mb-2 py-2">
						<div class="col-md-12">
							<div class="form-group">
								<label for="routes">Available Island Routes <x-asterisks /> </label>
								<select class="form-control form-select selectpicker @error('routes') is-invalid @enderror" id="routes" name="routes[]" aria-label="Routes" data-live-search="true" title="Choose Islands" multiple required>
									@foreach ($islets as $islet)
										<option value="{{ $islet->id }}" {{ in_array($islet->id, $selectedRoutes) ? 'selected' : '' }} > {{ $islet->name }}</option>
									@endforeach
								</select>
								@error('routes.*')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
						<a href="{{ route('pumpboats.index') }}" button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Back</button></a>
					</div>

				</form>
			</div>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-12">
			{{-- image gallery--}}
			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Pumpboat Attachments</h2>
				<section id="gallery" class="gallery">
					<div class="container-fluid">
						<div class="row gy-4 justify-content-center">
							@foreach ($pumpboat->getMedia('profiles') as $media)
								<div class="col-xl-3 col-lg-4 col-md-6">
									<div class="gallery-item h-100">
										<img src="{{ $media->getUrl() }}" class="img-fluid" alt="">
										<div class="gallery-links d-flex align-items-center justify-content-center">
											<a href="{{ $media->getUrl() }}" title="{{ $media->name }}" class="glightbox preview-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-expand" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
											</svg></a>
											<a href="#" class="delete-pumpboat-attachment details-link" data-id="{{ $media->uuid }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
												<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
												<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
											</svg></a>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</section>
			</div>

			{{-- cover photo section--}}
			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Pumpboat Cover Photo</h2>
				<section id="gallery" class="gallery">
					<div class="container-fluid">
						<div class="row gy-4 justify-content-center">
							@foreach ($pumpboat->getMedia('cover_photos') as $media)
								<div class="col-xl-3 col-lg-4 col-md-6">
									<div class="gallery-item h-100">
										<img src="{{ $media->getUrl() }}" class="img-fluid" alt="">
										<div class="gallery-links d-flex align-items-center justify-content-center">
											<a href="{{ $media->getUrl() }}" title="{{ $media->name }}" class="glightbox preview-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-expand" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
											</svg></a>
											<a href="#" class="delete-pumpboat-attachment details-link" data-id="{{ $media->uuid }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
												<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
												<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
											</svg></a>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	{{-- modal --}}
	<x-modal modal-id="pumpboat-attachment-modal" button-id="destroy-pumpboat-attachment" type="delete" label="pumpboat" />

	@push('styles')
			<link rel="stylesheet" href="{{ asset('css/page/pumpboat/image-gallery.css') }}">
	@endpush


	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/page/pumpboat/image-gallery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/page/pumpboat/edit.js') }}"></script>
	@endpush
</x-app-layout>

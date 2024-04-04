<x-app-layout>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-md-0">
            <h2 class="h4">Update an islet</h2>
        </div>
    </div>

    <div class="row">
			<div class="col-12 col-xl-8">

				{{-- update --}}
				<div class="card card-body border-0 shadow mb-4">
					<h2 class="h5 mb-4">Islet Information</h2>
					<form action="{{ route('islets.update', $islet->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
								<div class="col-md-6 mb-3">
										<div>
												<label for="name">Name
														<x-asterisks />
												</label>
												<input class="form-control @error('name') is-invalid @enderror" id="name"
														name="name" type="text" placeholder="Name"
														value="{{ old('name', $islet->name) }}" required>
												@error('name')
														<x-input-error message="{{ $message }}" />
												@enderror
										</div>
								</div>
								<div class="col-md-6 mb-3">
										<div>
												<label for="total_population">Total Population
														<x-asterisks />
												</label>
												<input class="form-control @error('total_population') is-invalid @enderror"
														id="total_population" name="total_population" type="number" min="3"
														placeholder="Total Population"
														value="{{ old('total_population', $islet->total_population) }}" required>
												@error('total_population')
														<x-input-error message="{{ $message }}" />
												@enderror
										</div>
								</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label for="latitude">Latitude
										<x-asterisks />
									</label>
									<input class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" type="text" placeholder="Latitude" value="{{ old('latitude', $islet->latitude) }}" required>
									@error('latitude')
										<x-input-error message="{{ $message }}" />
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label for="longitude">Longitude
										<x-asterisks />
									</label>
									<input class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" type="text" placeholder="Longitude" value="{{ old('longitude', $islet->longitude) }}" required>
									@error('longitude')
										<x-input-error message="{{ $message }}" />
									@enderror
								</div>
							</div>
						</div>

						<div class="row">
								<div class="col-md-12 mb-3">
										<div class="form-group">
												<label for="description">Description
														<x-asterisks />
												</label>
												<textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description"
														type="text" placeholder="Description" required>{{ old('description', $islet->description) }}</textarea>
												@error('description')
														<x-input-error message="{{ $message }}" />
												@enderror
										</div>
								</div>
						</div>

						{{-- address --}}
						@role('Administrator')
							<x-address :region="$islet->region" :province="$islet->province" :municipality="$islet->municipality" :barangay="$islet->barangay" :exclude-street="true"/>
						@else
							<x-address :disableRegion="true" :disableProvince="true" :disableMunicipality="true" :region="$islet->region" :province="$islet->province" :municipality="$islet->municipality" :barangay="$islet->barangay" :exclude-street="true"/>
						@endrole


						<div class="row">
								<div class="col-md-12 mb-3">
										<div class="form-group">
												<label for="file">Upload attachments:
														<x-asterisks />
												</label>
												<input class="form-control  @error('file') is-invalid @enderror" id="file"
														name="file[]" multiple type="file" placeholder="File" >
												@error('file')
														<x-input-error message="{{ $message }}" />
												@enderror
										</div>
								</div>
						</div>


						<div class="row">
							<div class="col-md-12 mb-3">
									<div class="form-group">
											<label for="cover_photo">Upload cover photo:
													<x-asterisks />
											</label>
											<input class="form-control  @error('cover_photo') is-invalid @enderror" id="cover_photo"
													name="cover_photo" type="file" placeholder="Cover Photo" >
											@error('cover_photo')
													<x-input-error message="{{ $message }}" />
											@enderror
									</div>
							</div>
					</div>

						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update</button>
						<a href="{{ route('islets.index') }}" class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Cancel</a>
					</form>
				</div>

				{{-- activities --}}
				<livewire:islet.activity.list-activity :islet="$islet" />

				{{-- image gallery --}}
				<div class="card card-body border-0 shadow mb-4">
					<h2 class="h5 mb-4">Islet Attachments</h2>
					<section id="gallery" class="gallery">
						<div class="container-fluid">
							<div class="row gy-4 justify-content-center">
								@foreach ($islet->getMedia('profiles') as $media)
									<div class="col-xl-3 col-lg-4 col-md-6">
										<div class="gallery-item h-100">
											<img src="{{ $media->getUrl() }}" class="img-fluid" alt="">
											<div class="gallery-links d-flex align-items-center justify-content-center">
												<a href="{{ $media->getUrl() }}" title="{{ $media->name }}" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
												<a href="#" class="delete-islet-attachment details-link" data-id="{{ $media->uuid }}"><i class="bi bi-trash"></i></a>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</section>
				</div>

				{{-- cover photo section --}}
				<div class="card card-body border-0 shadow mb-4">
					<h2 class="h5 mb-4">Islet Cover Photo</h2>
					<section id="gallery" class="gallery">
						<div class="container-fluid">
							<div class="row gy-4 justify-content-center">
								@foreach ($islet->getMedia('cover_photos') as $media)
									<div class="col-xl-3 col-lg-4 col-md-6">
										<div class="gallery-item h-100">
											<img src="{{ $media->getUrl() }}" class="img-fluid" alt="">
											<div class="gallery-links d-flex align-items-center justify-content-center">
												<a href="{{ $media->getUrl() }}" title="{{ $media->name }}" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
												<a href="#" class="delete-islet-attachment details-link" data-id="{{ $media->uuid }}"><i class="bi bi-trash"></i></a>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</section>
				</div>

			</div>

			<div class="col-12 col-xl-4">
				{{-- map preview --}}
				<div class="card card-body border-0 shadow mb-4">
					<h2 class="h5 mb-4">Map</h2>
					<div id="map" style="width: 100% !important;height: 300px !important;"></div>
				</div>
			</div>

    </div>

    {{-- modal --}}
    <x-modal modal-id="islet-attachment-modal" button-id="destroy-islet-attachment" type="delete" label="islet" />


		@push('styles')
			@livewireStyles(['nonce' => csp_nonce()])
			<link rel="stylesheet" href="{{ asset('css/page/islet/image-gallery.css') }}">
		@endpush

    @push('scripts')
			@livewireScripts(['nonce' => csp_nonce()])
			<script type="text/javascript" src="{{ asset('js/page/islet/image-gallery.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/page/islet/map.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/page/islet/edit.js') }}"></script>
    @endpush


</x-app-layout>

<x-app-layout>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
			<div class="d-block mb-md-0">
					<h2 class="h4">Registration Details</h2>
			</div>
	</div>
	<div class="row mb-4">
			<div class="col-12 col-xl-8">
					<div class="card card-body border-0 shadow mb-4">
						<h2 class="h5 mb-4">Registration Information</h2>

						{{-- name --}}
						<div class="row mb-2 py-2">
							<div class="col-md-12">
									<div class="form-group">
											<label for="name">Name
													<x-asterisks />
											</label>
											<input class="form-control @error('name') is-invalid @enderror" id="name"
													name="name" type="text" placeholder="First name"
													value="{{ $registration->name }}" disabled>
											@error('name')
													<x-input-error message="{{ $message }}" />
											@enderror
									</div>
							</div>
						</div>
						{{-- email, bday --}}
						<div class="row mb-2 py-2">
								<div class="col-md-6">
										<div class="form-group">
												<label for="email">Email
														<x-asterisks />
												</label>
												<input class="form-control @error('email') is-invalid @enderror" id="email"
														name="email" type="text" placeholder="Email" value="{{ $registration->email }}"
														disabled>
												@error('email')
														<x-input-error message="{{ $message }}" />
												@enderror
										</div>
								</div>
								<div class="col-md-6">
									<label for="birthdate">Birthday
											<x-asterisks />
									</label>
									<div class="input-group">
											<span class="input-group-text">
													<svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
															xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd"
																	d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
																	clip-rule="evenodd">
															</path>
													</svg>
											</span>
											<input class="form-control datepicker-input  @error('birthdate') is-invalid @enderror"
													id="birthdate" type="date" placeholder="yyyy-mm-dd" name="birthdate"
													fdprocessedid="1fw4ed" value="{{ $registration->birthdate }}" disabled>
											@error('birthdate')
													<x-input-error message="{{ $message }}" />
											@enderror
									</div>
								</div>
						</div>
						{{-- role --}}
						<div class="row">
							<div class="col-md-12 mb-3">
									<div class="form-group">
											<label for="role">Role
													<x-asterisks />
											</label>
											<select class="form-control form-select selectpicker mb-0 @error('role') is-invalid @enderror"
															id="role" name="role" type="text" aria-label="Select role" data-live-search="true"
															title="Choose Role" required>
													@foreach (config('constants.users_role') as $role)
															<option value="{{ $role }}"
																			{{ old('role', $registration->role) == $role ? 'selected' : '' }}>
																	{{ $role }}
															</option>
													@endforeach
											</select>
											@error('role')
													<x-input-error message="{{ $message }}" />
											@enderror
									</div>
							</div>
						</div>
						{{-- region, province, city, address --}}
						<div class="row mb-1 py-2">
							<div class="col-md-4">
								<div class="form-group">
									<label for="region">Region
										<x-asterisks />
									</label>
									<select class="form-control form-select selectpicker @error('region') is-invalid @enderror" id="region"
										name="region" type="text" data-live-search="true" required disabled>
									</select>
									@error('region')
									<x-input-error message="{{ $message }}" />
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="province">Province
										<x-asterisks />
									</label>
									<select class="form-control form-select selectpicker @error('province') is-invalid @enderror" id="province"
										name="province" type="text" data-live-search="true" required disabled>
									</select>
									@error('province')
									<x-input-error message="{{ $message }}" />
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="municipality">City/Municipality
										<x-asterisks />
									</label>
									<select class="form-control form-select selectpicker @error('municipality') is-invalid @enderror"
										id="municipality" name="municipality" type="text" data-live-search="true" required disabled>
									</select>
									@error('municipality')
									<x-input-error message="{{ $message }}" />
									@enderror
								</div>
							</div>
						</div>
						{{-- Important Documentsgallery --}}
						<div class="row mb-2">
							<div class="col-12 col-xl-12">
								{{-- Document Image section--}}
								<div class="card card-body border-0 shadow mb-4">
									<h2 class="h5 mb-4">Document/s</h2>
									<section id="gallery" class="gallery">
										<div class="container-fluid">
											<div class="row gy-4 justify-content-center">
												@foreach ($registration->getMedia('validation_documents') as $media)
													<div class="col-xl-3 col-lg-4 col-md-6">
														<div class="gallery-item h-100">
															<img src="{{ $media->getUrl() }}" class="img-fluid" alt="">
															<div class="gallery-links d-flex align-items-center justify-content-center">
																<a href="{{ $media->getUrl() }}" title="{{ $media->name }}" class="glightbox preview-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-expand" viewBox="0 0 16 16">
																	<path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
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

						{{-- buttons --}}
						<div class="mt-3">
							<a href="{{ route('registrations.index') }}" class="btn btn-gray-800 mt-2 animate-up-2">Back</a>
						</div>
					</div>
			</div>
	</div>

	@push('styles')
		<link rel="stylesheet" href="{{ asset('css/page/registration/image-gallery.css') }}">
	@endpush

	@push('scripts')
		<script nonce="{{ csp_nonce() }}">
			$(function () {

				var address = {
					region: '{{ old('region', $region ?? $registration->region) }}',
					province: '{{ old('province', $province ?? $registration->province) }}',
					municipality: '{{ old('municipality', $municipality ?? $registration->municipality) }}',
				};

				axios.get('{{ config('app.psgc_api') }}/regions')
				.then(response => {
					let data = response.data;
					var options = '';
					$.each(data, function (index, data) {
						var selected = '';
						if (data.code == address.region) {
							selected = ' selected ';
						}
						options += '<option value="' + data.code + '"' + selected + '>' + data.name + '</option>';
					});
					$('#region').html(options);
					$('.selectpicker').selectpicker('refresh');
					$('#region').change();
				})
				.catch(error => {
					toast.fire({
						icon: 'error',
						title: 'Unable to retrieve regions.',
					})
				});

				$('#region').on('change', function () {
					axios.get('{{ config('app.psgc_api') }}/regions/' + this.value + '/provinces/')
					.then(response => {
						let data = response.data;
						var options = '';
						$.each(data, function (index, data) {
							var selected = '';
							if (data.code == address.province) {
								selected = ' selected ';
							}
							options += '<option value="' + data.code + '"' + selected + '>' + data.name + '</option>';
						});
						$('#province').html(options);
						$('.selectpicker').selectpicker('refresh');
						$('#province').change();
					})
					.catch(error => {
						toast.fire({
							icon: 'error',
							title: 'Unable to retrieve provinces.',
						})
					});
				});

				$('#province').on('change', function () {
					axios.get('{{ config('app.psgc_api') }}/provinces/' + this.value + '/municipalities/')
					.then(response => {

						let municipalData = response.data;

						// include origin for every object to identify where the data comes from
						$.each(municipalData, function (index, data) {
							let object = data;
							object['origin'] = 'municipalities';
							municipalData[index] = object;
						});

						axios.get('{{ config('app.psgc_api') }}/provinces/' + this.value + '/cities/')
						.then(response => {

							let cityData = response.data;

							// include origin for every object to identify where the data comes from
							$.each(cityData, function (index, data) {
								let object = data;
								object['origin'] = 'cities';
								cityData[index] = object;
							});

							// merge arrays
							let data = municipalData.concat(cityData);

							// sort ascending order
							data.sort((a, b) => (a.name > b.name) ? 1: -1);

							var options = '';

							$.each(data, function (index, data) {
								var selected = '';
								if (data.code == address.municipality) {
									selected = ' selected ';
								}
								options += '<option data-origin="' + data.origin + '" value="' + data.code + '"' + selected + '>' + data.name + '</option>';
							});
							$('#municipality').html(options);
							$('.selectpicker').selectpicker('refresh');
						})
						.catch(error => {
							toast.fire({
								icon: 'error',
								title: 'Unable to retrieve cities.',
							})
						});

					})
					.catch(error => {
						toast.fire({
							icon: 'error',
							title: 'Unable to retrieve municipalities.',
						})
					});
				});
			})
		</script>
		<script type="text/javascript" src="{{ asset('js/page/registration/image-gallery.js') }}"></script>

	@endpush

</x-app-layout>


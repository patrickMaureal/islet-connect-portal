<x-guest-layout>
  <section class="d-flex align-items-center justify-content-center">
    <div class="container my-7">
      <div class="row justify-content-center form-bg-image">
        <div class="col-12 d-flex align-items-center justify-content-center">
          <div class="bg-white shadow border-0 rounded border-light p-4 mx-1 mx-lg-5 w-100">
						{{-- Session Status --}}
						<x-auth-session-status class="alert-success" :status="session('status')" />

						<form method="POST" action="{{ route('register') }}" class="mt-4" enctype="multipart/form-data">

							@csrf

							<div class="row mb-4">
								<div class="col-12 col-xl-12">
									@csrf

									<div class="row">
										<div class="col-md-4 mb-3">
											<div class="form-group">
												<label for="name">Full Name
													<x-asterisks />
												</label>
												<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Surname, First name" value="{{ old('name') }}" required>
												@error('name')
													<x-input-error message="{{ $message }}" />
												@enderror
											</div>
										</div>
										<div class="col-md-4 mb-3">
											<div class="form-group">
												<label for="birthdate">Birthday <x-asterisks /> </label>
												<div class="input-group">
													<span class="input-group-text">
														<img src="{{ asset('img/register/calendar-icon.svg') }}" class="icon icon-xs" alt="">
													</span>
													<input class="form-control datepicker-input  @error('birthdate') is-invalid @enderror" id="birthdate" type="date" placeholder="yyyy-mm-dd" name="birthdate" fdprocessedid="1fw4ed" value="{{ old('birthdate') }}" required>
													@error('birthdate')
														<x-input-error message="{{ $message }}" />
													@enderror
												</div>
											</div>
										</div>
										<div class="col-md-4 mb-3">
											<div class="form-group">
												<label for="email">Email
														<x-asterisks />
												</label>
												<input class="form-control @error('email') is-invalid @enderror" id="email"
														name="email" type="email" placeholder="Email" value="{{ old('email') }}"
														required>
												@error('email')
														<x-input-error message="{{ $message }}" />
												@enderror
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mb-3">
											<div class="form-group">
												<label for="role">Role
													<x-asterisks />
												</label>
												<select class="form-control form-select selectpicker mb-0 @error('role') is-invalid @enderror" id="role" name="role" type="text" aria-label="Select role" data-live-search="true" title="Choose Role" required>
													@foreach (config('constants.users_role') as $role)
														<option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>{{ $role }}</option>
													@endforeach
												</select>
												@error('role')
													<x-input-error message="{{ $message }}" />
												@enderror
											</div>
										</div>
									</div>

									<div class="row mb-1 py-2">
										<div class="col-md-4">
											<div class="form-group">
												<label for="region">Region
													<x-asterisks />
												</label>
												<select class="form-control form-select selectpicker @error('region') is-invalid @enderror" id="region" name="region" type="text" data-live-search="true" required></select>
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
												<select class="form-control form-select selectpicker @error('province') is-invalid @enderror" id="province" name="province" type="text" data-live-search="true" required>
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
												<select class="form-control form-select selectpicker @error('municipality') is-invalid @enderror" id="municipality" name="municipality" type="text" data-live-search="true" required>
												</select>
												@error('municipality')
													<x-input-error message="{{ $message }}" />
												@enderror
											</div>
										</div>
									</div>

									<div class="col-md-12 mb-3 mt-3">
										<div class="form-group">
											<label for="file">Upload attachments:
												<x-asterisks />
											</label>
											<input class="form-control  @error('validation_document') is-invalid @enderror" id="validation_document" name="validation_document" type="file" placeholder="Upload attachments" required>
											@error('validation_document')
												<x-input-error message="{{ $message }}" />
											@enderror
										</div>
										<div class="row">
											<div class="col-lg-4 col-md-6">
												<div class="alert alert-info mt-3">
													<p class="mb-0">Images of Supported Document</p>
													<i class="icon icon-md bi bi-info-circle-fill"></i>
													<p class="mb-0 d-inline">Allowed File Types: <span class="text-danger">.jpg, .png</span></p>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>

							<div class="d-flex align-item-center justify-content-center">
								<button type="submit" class="btn-register">Register</button>
							</div>

						</form>

					</div>
				</div>
			</div>
			<div class="align-items-start justify-content-start mt-5 btn-back-home">
				<a href="{{ url('/') }}" class="btn-back"><i class="icon icon-md bi bi-arrow-left"></i>Back to homepage</a>
			</div>
		</div>
  </section>
	@push('scripts')
		<script nonce="{{ csp_nonce() }}">
			$(function () {

				var address = {
					region: '{{ old('region') }}',
					province: '{{ old('province') }}',
					municipality: '{{ old('municipality') }}',
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
	@endpush

	@push('styles')
		<link rel="stylesheet" href="{{ asset('css/theme/home/register.css') }}">
	@endpush
</x-guest-layout>

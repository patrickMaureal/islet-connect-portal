<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
			<div class="d-block mb-md-0">
					<h2 class="h4">Add User</h2>
			</div>
	</div>

	<div class="row mb-4">
			<div class="col-12 col-xl-12">

					<div class="card card-body border-0 shadow mb-4">
							<h2 class="h5 mb-4">User information</h2>

							<form method="POST" action="{{ route('users.store') }}">
									@csrf

									<div class="row">
											<div class="col-md-6 mb-3">
													<div class="form-group">
															<label for="name">Name
																	<x-asterisks />
															</label>
															<input class="form-control @error('name') is-invalid @enderror" id="name"
																	name="name" type="text" placeholder="Name" value="{{ old('name') }}"
																	required>
															@error('name')
																	<x-input-error message="{{ $message }}" />
															@enderror
													</div>
											</div>

											<div class="col-md-6 mb-3">
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
											<div class="col-md-6 mb-3">
													<div class="form-group">
															<label for="password">Password
																	<x-asterisks />
															</label>
															<input class="form-control @error('password') is-invalid @enderror" id="password"
																	name="password" type="password" placeholder="Password" required>
															@error('password')
																	<x-input-error message="{{ $message }}" />
															@enderror
													</div>
											</div>

											<div class="col-md-6 mb-3">
													<div class="form-group">
															<label for="password_confirmation">Confirm Password
																	<x-asterisks />
															</label>
															<input class="form-control" id="password_confirmation" name="password_confirmation"
																	type="password" placeholder="Confirm Password">
													</div>
											</div>
									</div>

									<div class="row">
											<div class="col-md-12 mb-3">
													<div class="form-group">
															<label for="role">Role
																	<x-asterisks />
															</label>
															<select class="form-control form-select selectpicker mb-0 @error('role') is-invalid @enderror"
																	id="role" name="role" type="text" aria-label="Select role" data-live-search="true"
																	title="Choose Role" required>
																	@foreach ($roles as $role)
																		<option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>{{ $role }}</option>
																	@endforeach
															</select>
															@error('role')
																	<x-input-error message="{{ $message }}" />
															@enderror
													</div>
											</div>
									</div>

									{{-- address --}}
									<div class="row mb-2 py-2">
										<div class="col-md-4">
											<div class="form-group">
												<label for="region">Region
													<x-asterisks />
												</label>
												<select class="form-control form-select selectpicker @error('region') is-invalid @enderror" id="region"
													name="region" type="text" data-live-search="true" required>
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
													name="province" type="text" data-live-search="true" required>
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
													id="municipality" name="municipality" type="text" data-live-search="true" required>
												</select>
												@error('municipality')
												<x-input-error message="{{ $message }}" />
												@enderror
											</div>
										</div>
									</div>

									{{-- button --}}
									<div class="mt-3">
											<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
											<a href="{{ route('users.index') }}" button class="btn btn-gray-800 mt-2 animate-up-2"
													type="submit">Back</button></a>
									</div>

							</form>

					</div>

			</div>
	</div>
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
</x-app-layout>

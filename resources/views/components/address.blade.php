@props([
	'region', 
	'province', 
	'municipality', 
	'barangay', 
	'street', 
	'excludeStreet' => false,
	'disableRegion' => false,
	'disableProvince' => false,
	'disableMunicipality' => false,
	'disableBarangay' => false,
])

<div class="row mb-2 py-2">
	<div class="col-md-3">
		<div class="form-group">
			<label for="region">Region
				<x-asterisks />
			</label>
			<select {{ $disableRegion ? 'disabled' : '' }} class="form-control form-select selectpicker @error('region') is-invalid @enderror" id="region"
				name="region" type="text" data-live-search="true" required>
			</select>
			@error('region')
			<x-input-error message="{{ $message }}" />
			@enderror
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="province">Province
				<x-asterisks />
			</label>
			<select {{ $disableProvince ? 'disabled' : '' }} class="form-control form-select selectpicker @error('province') is-invalid @enderror" id="province"
				name="province" type="text" data-live-search="true" required>
			</select>
			@error('province')
			<x-input-error message="{{ $message }}" />
			@enderror
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="municipality">City/Municipality
				<x-asterisks />
			</label>
			<select {{ $disableMunicipality ? 'disabled' : '' }} class="form-control form-select selectpicker @error('municipality') is-invalid @enderror"
				id="municipality" name="municipality" type="text" data-live-search="true" required>
			</select>
			@error('municipality')
			<x-input-error message="{{ $message }}" />
			@enderror
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="barangay">Barangay
				<x-asterisks />
			</label>
			<select {{ $disableBarangay ? 'disabled' : '' }} class="form-control form-select selectpicker @error('barangay') is-invalid @enderror" id="barangay"
				name="barangay" type="text" data-live-search="true" required>
			</select>
			@error('barangay')
			<x-input-error message="{{ $message }}" />
			@enderror
		</div>
	</div>
</div>

@if(! $excludeStreet)
	<div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="street">Street </label>
					<input type="text" id="street" name="street" class="form-control @error('street') is-invalid @enderror" placeholder="Street" value="{{ $street ?? '' }}">
					@error('street')
						<x-input-error message="{{ $message }}" />
					@enderror
				</div>
			</div>
		</div>
	</div>
@endif

@push('scripts')
<script nonce="{{ csp_nonce() }}">
	$(function () {

			var address = {
				region: '{{ old('region', $region ?? '') }}',
				province: '{{ old('province', $province ?? '') }}',
				municipality: '{{ old('municipality', $municipality ?? '') }}',
				barangay: '{{ old('barangay', $barangay ?? '') }}',
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
						$('#municipality').change();
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

			// get all barangays
			$('#municipality').on('change', function (event) {

				// get data-origin attribute
				let origin = event.target.options[event.target.selectedIndex].dataset.origin;
				let url = '';

				// url base on origin
				if (origin == 'municipalities') {
					url = '{{ config('app.psgc_api') }}/municipalities/';
				} else {
					// origin == 'cities'
					url = '{{ config('app.psgc_api') }}/cities/';
				}

				axios.get(url + this.value + '/barangays/')
				.then(response => {
					let data = response.data;
					var options = '';
					$.each(data, function (index, data) {
						var selected = '';
						if (data.code == address.barangay) {
							selected = ' selected ';
						}
						options += '<option value="' + data.code + '"' + selected + '>' + data.name + '</option>';
					});
					$('#barangay').html(options);
					$('.selectpicker').selectpicker('refresh');
					$('#barangay').change();
				})
				.catch(error => {
					toast.fire({
						icon: 'error',
						title: 'Unable to retrieve barangays.',
					})
				});

			});

		})
</script>
@endpush

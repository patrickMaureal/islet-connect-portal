<x-app-layout>
	{{-- Header --}}
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Update Profile</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-8">

			{{-- profile information --}}
			@include('profile.partials.update-profile')

			{{-- profile password --}}
			@include('profile.partials.update-password')

		</div>

		{{-- Resident Profile --}}
		<div class="col-12 col-xl-4">

			{{-- photo --}}
			<div class="card shadow border-0 text-center p-0 mb-4">
				<img class="profile-cover rounded-top" data-background="{{ asset('img/resident-profile/RP-2.jpg') }}"
					style="{{ asset('img/resident-profile/RP-2.jpg') }}">
				<div class="card-body pb-5">
					<img id="user-image" src="{{ $user->getFirstMediaUrl('profiles') ? $user->getFirstMediaUrl('profiles') :  asset('img/team/profile-picture-3.jpg') }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait"></img>
					<h4 class="h3">
						{{ auth()->user()->name }}
					</h4>
					<button type="button" id="update-profile-picture"
						class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" data-id="{{ $user->id }}">Update Profile Photo
					</button>
				</div>
			</div>

			@role('LGU')

				{{-- address --}}
				<div class="card border-0 shadow">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between border-bottom py-3">
							<div>
								<div class="h6 mb-0 d-flex align-items-center">
									<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
										xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd"
											d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
											clip-rule="evenodd"></path>
									</svg>
									Region
								</div>
								<div class="small card-stats">
									<span id="region-text"></span>
								</div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-between border-bottom py-3">
							<div>
								<div class="h6 mb-0 d-flex align-items-center">
									<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
										xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
											clip-rule="evenodd"></path>
										<path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"></path>
									</svg>
									Province
								</div>
								<div class="small card-stats">
									<span id="province-text"></span>
								</div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-between pt-3">
							<div>
								<div class="h6 mb-0 d-flex align-items-center">
									<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
										xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
											clip-rule="evenodd"></path>
										<path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"></path>
									</svg>
									City/Municipality
								</div>
								<div class="small card-stats">
									<span id="city-text"></span>
								</div>
							</div>
						</div>
					</div>
				</div>

			@endrole

		</div>

	</div>

	<x-camera modal-id="profile-modal" button-id="accept" />

	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/page/profile/edit.js') }}"></script>

		@role('LGU')
			<script type="text/javascript" nonce="{{ csp_nonce() }}">
				$(function() {

					let regionCode 							= '{{ $user->region }}';
					let provinceCode 						= '{{ $user->province }}';
					let cityOrMunicipalityCode 	= '{{ $user->municipality }}';

					// region
					axios.get('{{ config('app.psgc_api') }}/regions/' + regionCode)
					.then(response => {
						let regionData = response.data;
						$('#region-text').text(regionData.name);
					})
					.catch(error => {
						toast.fire({
							icon: 'error',
							title: 'Unable to retrieve regions.',
						})
					});

					// province
					axios.get('{{ config('app.psgc_api') }}/provinces/' + provinceCode)
					.then(response => {
						let provinceData = response.data;
						$('#province-text').text(provinceData.name);
					})
					.catch(error => {
						toast.fire({
							icon: 'error',
							title: 'Unable to retrieve regions.',
						})
					});

					// city or municipality
					axios.get('{{ config('app.psgc_api') }}/cities-municipalities/' + cityOrMunicipalityCode)
					.then(response => {
						let cityOrMunicipalityData = response.data;
						$('#city-text').text(cityOrMunicipalityData.name);
					})
					.catch(error => {
						toast.fire({
							icon: 'error',
							title: 'Unable to retrieve regions.',
						})
					});

				})
			</script>
		@endrole

	@endpush

</x-app-layout>

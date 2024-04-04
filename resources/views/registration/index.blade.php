<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Registrations</h2>
		</div>
	</div>
	<div class="table-settings mb-4">
		<div class="row align-items-center justify-content-between">
			<div class="col col-md-6 col-lg-3 col-xl-4">
				<div class="input-group me-2 me-lg-3 fmxw-400">
					<span class="input-group-text">
						<svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
							<path fill-rule="evenodd"
								d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
								clip-rule="evenodd"></path>
						</svg>
					</span>
					<input id="custom-search-field" type="text" class="form-control" placeholder="Search user..">
				</div>
			</div>
			<div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
				<select id="custom-page-length" class="form-select fmxw-200 d-md-inline" aria-label="Message select example 2">
					<option value="5" selected>5</option>
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</div>
		</div>
	</div>
	<div class="card mb-5">
		<div class="card-body table-wrapper table-responsive">
			<table class="table table-hover" id="registration-table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Date Added</th>
						<th>Status</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>

	<x-modal modal-id="registration-modal" button-id="verify-registration" type="confirm" label="email" />
	<x-modal modal-id="deny-registration-modal" button-id="deny-registration" type="deny" label="Registration" />


	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/page/registration/index.js') }}"></script>
	@endpush
</x-app-layout>


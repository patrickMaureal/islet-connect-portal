<x-app-layout>
	<div class="row">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
			<div class="d-block mb-md-0">
				<h2 class="h4">Activity Attachments</h2>
			</div>
		</div>
		<div class="col-12 col-xl-3">
			<div class="card border-0 shadow mb-2">
				<div class="card-body">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3">
						<div class="d-block mb-md-0">
							<h3 class="h5">Islet Information</h3>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between border-bottom pb-3">
						<div>
							<div class="h6 mb-0 d-flex align-items-center">
								<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
										clip-rule="evenodd"></path>
								</svg>
								Islet Name
							</div>
							<div class="small card-stats">
								{{ $islet->name }}
							</div>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between border-bottom py-3">
						<div>
							<div class="h6 mb-0 d-flex align-items-center">
								<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
									</path>
								</svg>
								Population
							</div>
							<div class="small card-stats">
								{{ $islet->total_population }}
								<svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
										clip-rule="evenodd"></path>
								</svg>
							</div>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between border-bottom py-3">
						<div>
							<div class="h6 mb-0 d-flex align-items-center">
								<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
										clip-rule="evenodd">
									</path>
								</svg>
								Longitude
							</div>
							<div class="small card-stats">
								{{ $islet->longitude }}
							</div>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between py-3">
						<div>
							<div class="h6 mb-0 d-flex align-items-center">
								<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
										clip-rule="evenodd"></path>
								</svg>
								Latitude
							</div>
							<div class="small card-stats">
								{{ $islet->latitude }}
							</div>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between py-3">
						<a class="btn btn-sm btn-primary small fw-bold" href="{{ route('islets.edit', $islet->id) }}"><span
								class="bi bi-back me-2"></span>Back</a>
					</div>
				</div>
			</div>
			<div class="card border-0 shadow mb-2">
				<div class="card-body">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3">
						<div class="d-block mb-md-0">
							<h3 class="h5">Islet Activity Information</h3>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between border-bottom pb-3">
						<div>
							<div class="h6 mb-0 d-flex align-items-center">
								<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg">
									<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
									<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
									<g id="SVGRepo_iconCarrier">
										<path
											d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM17.26 9.96L14.95 12.94C14.66 13.31 14.25 13.55 13.78 13.6C13.31 13.66 12.85 13.53 12.48 13.24L10.65 11.8C10.58 11.74 10.5 11.74 10.46 11.75C10.42 11.75 10.35 11.77 10.29 11.85L7.91 14.94C7.76 15.13 7.54 15.23 7.32 15.23C7.16 15.23 7 15.18 6.86 15.07C6.53 14.82 6.47 14.35 6.72 14.02L9.1 10.93C9.39 10.56 9.8 10.32 10.27 10.26C10.73 10.2 11.2 10.33 11.57 10.62L13.4 12.06C13.47 12.12 13.54 12.12 13.59 12.11C13.63 12.11 13.7 12.09 13.76 12.01L16.07 9.03C16.32 8.7 16.8 8.64 17.12 8.9C17.45 9.17 17.51 9.64 17.26 9.96Z"
											fill="#616569"></path>
									</g>
								</svg>
								Activity
							</div>
							<div class="small card-stats">
								{{ $isletActivity->activity }}
							</div>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between py-3">
						<div>
							<div class="h6 mb-0 d-flex align-items-center">
								<svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd"
										d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
										clip-rule="evenodd"></path>
								</svg>
								Description
							</div>
							<div class="small card-stats">
								{{ $isletActivity->description }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-xl-9">
			<div class="card card-body border-0 shadow mb-4">
				<h3 class="fs-5 fw-bold mb-3">File Upload</h3>
				<form action="{{ route('islets.activities.attachments.store', $isletActivity->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="form-group mb-3">
								<label for="attachments">Upload Attachment:
									<x-asterisks />
								</label>
								<input class="form-control @error('attachments.*') is-invalid @enderror" id="attachments" name="attachments[]" type="file" multiple>
								@error('attachments.*')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
							<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit"><i class="bi bi-upload me-2"></i>Upload</button>
						</div>
					</div>
				</form>
			</div>
			<div class="card border-0 shadow mb-4">
				<div class="card-header border-bottom d-flex align-items-center justify-content-between">
					<h3 class="fs-5 fw-bold mb-0">List of Attachments</h3>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-6  rounded" id="attachment-table">
							<thead class="thead-light">
								<tr>
									<th class="border-0 rounded-start">#</th>
									<th class="border-0">File</th>
									<th class="border-0">Type</th>
									<th class="border-0 rounded-end">Actions</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($isletActivity->getMedia('profiles') as $attachment)
								<tr>
									<td>
										<span class="small fw-bold">{{ $loop->iteration }}</span>
									</td>
									<td>
										<span class="small fw-bold">{{ $attachment->name }}</span>
									</td>
									<td>
										<span class="small fw-bold">{{ $attachment->mime_type }}</span>
									</td>
									<td>
										<div class="btn-group">
											<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
												data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="bi bi-three-dots-vertical"></span>
												<span class="visually-hidden">Toggle Dropdown</span>
											</button>
											<div class="dropdown-menu py-0">
												<a class="dropdown-item rounded-top " href="{{ route('islets.activities.attachments.download', $attachment->uuid) }}"><span class="bi bi-cloud-arrow-down-fill text-success me-2"></span>Download</a>
												<button class="destroy-attachment dropdown-item text-danger rounded-bottom" data-id="{{ $attachment->uuid }}"><span class="bi bi-trash-fill me-2"></span>Remove</button>
											</div>
										</div>
									</td>
								</tr>
								@empty
									<tr class="text-center">
										<td colspan="4">No record.</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- modal --}}
	<x-modal modal-id="attachments-modal" button-id="destroy-attachments" type="delete" label="Activity Attachments" />

	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/page/islet/attachment.js') }}"></script>
	@endpush
</x-app-layout>
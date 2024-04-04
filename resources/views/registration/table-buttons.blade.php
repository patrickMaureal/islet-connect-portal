<div class="btn-group">
	<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="bi bi-three-dots" ></span>
		<span class="visually-hidden">Toggle Dropdown</span>
	</button>
	<div class="dropdown-menu py-0">
		<a class="dropdown-item rounded-top text-info" href="{{ route('registrations.show',$row['id']) }}"><span class="bi bi-view-stacked me-2"></span>View Details</a>
		@if ($row['status'] === 'Unverified')
			<button class="verify-registration dropdown-item rounded-top text-success" data-id="{{ $row['id'] }}"><span class="bi bi-check-circle me-2"></span>Verify</button>
			<button class="deny-registration dropdown-item rounded-top text-danger" data-id="{{ $row['id'] }}"><span class="bi bi-x-circle me-2"></span>Deny</button>
		@endif
	</div>
</div>








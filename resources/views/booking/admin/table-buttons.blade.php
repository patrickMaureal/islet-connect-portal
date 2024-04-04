<div class="btn-group">
	<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="bi bi-three-dots"></span>
			<span class="visually-hidden">Toggle Dropdown</span>
	</button>
	<div class="dropdown-menu py-0">
		@if ($row['status'] === 'Pending')
			<a class="dropdown-item rounded-top" href="{{ route('bookings.edit', $row['id']) }}"><span class="bi bi-pencil-fill me-2"></span>View Details</a>
			<button class="confirm-booking dropdown-item text-success" data-id="{{ $row['id'] }}"><span class="bi bi-check-circle-fill me-2"></span>Confirm</button>
			<button class="cancel-booking dropdown-item text-danger rounded-bottom" data-id="{{ $row['id'] }}"><span class="bi bi-file-earmark-x-fill me-2"></span>Cancel</button>
		@else

			<a class="dropdown-item rounded-top" href="{{ route('bookings.show', $row['id']) }}"><span class="bi bi-pencil-fill me-2"></span>View Details</a>

			@if ($row['status'] === 'Paid')
				<a class="dropdown-item text-success " target="_blank" href="{{ route('bookings.print', $row['id']) }}"><span class="bi bi-printer-fill me-2"></span>Print</a>
			@else
				<button class="revert-booking dropdown-item text-warning rounded-bottom" data-id="{{ $row['id'] }}"><span class="bi bi-backspace-fill me-2"></span>Revert</button>
			@endif

		@endif
	</div>
</div>








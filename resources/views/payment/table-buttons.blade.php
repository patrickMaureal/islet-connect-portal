<div class="btn-group">
	<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="bi bi-three-dots"></span>
			<span class="visually-hidden">Toggle Dropdown</span>
	</button>
	<div class="dropdown-menu py-0">
		<button class="delete-payment dropdown-item text-danger rounded-top" data-id="{{ $id }}"><span class="bi bi-trash-fill me-2"></span>Remove</button>
		<a class="dropdown-item text-success rounded-bottom" target="_blank" href="{{ route('payments.print', $id) }}"><span class="bi bi-printer-fill me-2"></span>Print</a>
	</div>
</div>








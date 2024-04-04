<div class="btn-group">
	<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="bi bi-three-dots" ></span>
		<span class="visually-hidden">Toggle Dropdown</span>
	</button>
	<div class="dropdown-menu py-0">
		<a class="dropdown-item rounded-top" href="{{ route('pumpboats.edit', $id) }}"><span class="bi bi-pencil-fill me-2"></span>Edit</a>
		<button class="delete-pumpboat dropdown-item text-danger rounded-bottom" data-id="{{ $id }}"><span class="bi bi-trash-fill me-2"></span>Remove</button>
	</div>
</div>

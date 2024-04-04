<div>
  {{-- modal --}}
  <div class="modal fade" data-backdrop="static" data-keyboard="false" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">

        @if ($type === 'delete')
          <div class="modal-header">
            <h5 class="modal-title">Delete Confirmation</h5>
            <span class="pull-right">
              <img class="spinner" src="{{ asset('img/spinner.gif') }}">
            </span>
          </div>
          <div class="modal-body">
            <p>Delete {{ $label }}?</p>
          </div>
          <div class="modal-footer">
						<button id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i class="far fa-window-close"></i> Close </button>
						<button  id="{{ $buttonId }}" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete </button>
          </div>
        @endif

				@if($type === 'confirm')
					<div class="modal-header">
						<h5 class="modal-title">Verification</h5>
						<span class="pull-right">
							<img class="spinner" src="{{ asset('img/spinner.gif') }}">
						</span>
					</div>
					@if ($label === 'email')
						<div class="modal-body">
							<p>Verify {{ $label }}?<br>This will create a new user account.</p>
						</div>
					@else
						<div class="modal-body">
							<p>Verify {{ $label }}?</p>
						</div>
					@endif
					<div class="modal-footer">
						<button id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i class="far fa-window-close"></i> No </button>
						<button  id="{{ $buttonId }}" class="btn btn-outline-success"><i class="far fa-square-check"></i> Yes </button>
					</div>
				@endif

				@if($type === 'cancel')
					<div class="modal-header">
						<h5 class="modal-title">Booking Cancellation</h5>
						<span class="pull-right">
							<img class="spinner" src="{{ asset('img/spinner.gif') }}">
						</span>
					</div>
					<div class="modal-body">
						<p>Cancel {{ $label }}?</p>
					</div>
					<div class="modal-footer">
						<button id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i class="far fa-window-close"></i> No </button>
						<button  id="{{ $buttonId }}" class="btn btn-outline-danger"><i class="far fa-square-check"></i> Yes </button>

					</div>
				@endif

				@if($type === 'revert')
					<div class="modal-header">
						<h5 class="modal-title">Booking Status Revert</h5>
						<span class="pull-right">
							<img class="spinner" src="{{ asset('img/spinner.gif') }}">
						</span>
					</div>
					<div class="modal-body">
						<p>Revert {{ $label }} Status?</p>
					</div>
					<div class="modal-footer">
						<button id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i class="far fa-window-close"></i> No </button>
						<button  id="{{ $buttonId }}" class="btn btn-outline-danger"><i class="far fa-square-check"></i> Yes </button>
					</div>
				@endif

				@if($type === 'deny')
					<div class="modal-header">
						<h5 class="modal-title">Registration Deny</h5>
						<span class="pull-right">
							<img class="spinner" src="{{ asset('img/spinner.gif') }}">
						</span>
					</div>
					<div class="modal-body">
						<p>Are you sure?</p>
					</div>
					<div class="modal-footer">
						<button id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i class="far fa-window-close"></i> No </button>
						<button  id="{{ $buttonId }}" class="btn btn-outline-danger"><i class="far fa-square-check"></i> Yes </button>
					</div>
				@endif


      </div>
    </div>
  </div>

</div>

<div>
	<div class="modal-header">
		<h5 class="modal-title">Add Activity</h5>
		<span class="pull-right">
			<img class="spinner" src="{{ asset('img/spinner.gif') }}">
		</span>
	</div>
	<form wire:submit="{{ ($isletActivity) ? 'update' : 'store' }}" enctype="multipart/form-data">
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group mb-3">
						<label for="activity">Activity <x-asterisks /> </label>
						<input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" wire:model.live="activity" placeholder="Activity" />
						@error('activity')
							<x-input-error message="{{ $message }}" />
						@enderror
					</div>
					<div class="form-group mb-3">
						<label for="activity">Description <x-asterisks /> </label>
						<textarea class="form-control @error('description') is-invalid @enderror" rows="4" wire:model="description" placeholder="Description"></textarea>
						@error('description')
							<x-input-error message="{{ $message }}" />
						@enderror
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" id="close-button" wire:click="close" class="btn btn-outline-secondary"><i class="far fa-window-close"></i> Close </button>
			<button type="submit" id="save" class="btn btn-outline-primary"><i class="far fa-trash-alt"></i> Save </button>
		</div>
	</form>
</div>

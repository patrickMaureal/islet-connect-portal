<div>
  <form wire:submit="submit"  role="form" class="php-email-form">
		<div class="row">
			<div class="col-md-6 form-group">
				<input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" wire:model="first_name" required>
			</div>
			<div class="col-md-6 form-group">
				<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" wire:model="last_name" required>
			</div>
			<div class="col-md-6 form-group mt-3">
				<input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" wire:model="phone_number" required>
			</div>
			<div class="col-md-6 form-group mt-1">
				<input type="email" class="form-control" name="email" id="email" placeholder="Email" wire:model="email" required>
			</div>
		</div>
		<div class="form-group mt-3">
			<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" wire:model="subject" required>
		</div>
		<div class="form-group mt-3">
			<label for="message-area">Message</label>
			<textarea class="form-control" name="message" wire:model="message" required></textarea>
		</div>
		<div class="text-center">
			<button type="submit" wire:loading.remove>Send Message</button></div>
			<button type="button" wire:loading class="btn-sending" disabled>
				<i class="fas fa-spinner fa-spin"></i>
				Sending .....
			</button>
		</div>
	</form>
</div>

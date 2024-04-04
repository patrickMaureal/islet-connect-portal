<section id="contact" class="contact">
  <div class="container">

    <div class="contact-header">
      <h2>Get in Touch!</h2>
    </div>

  </div>

  <div class="container">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="info">
							<div class="info-item d-flex">
								<i class="bi bi-geo-alt flex-shrink-0"></i>
								<div>
									<h4>Location:</h4>
									<p>Room 304/3F, Long Se Dy Building, Jasmin St, Osmeña Blvd, Cebu City, 6000 Cebu</p>
								</div>
							</div>

							<div class="info-item d-flex mb-3">
								<i class="bi bi-envelope flex-shrink-0"></i>
								<div>
									<h4>Email:</h4>
									<p>info@isletconnect.com</p>
								</div>
							</div>

							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3910.5540208563217!2d123.8892604!3d10.3127905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999e6f8df85eb%3A0x20eafc7c5d8c2314!2sCVISNET+FOUNDATION+INC!5e0!3m2!1sen!2sph!4v1623781597103!5m2!1sen!2sph" frameborder="0" style="border:0; width: 100%; height: 197px;" allowfullscreen=""></iframe>

						</div>
					</div>
					<div class="col-lg-8">
						<livewire:home.contact-form />
					</div>
				</div>
			</div>
		</div>
  </div>

	@push('scripts')
		<script nonce="{{ csp_nonce() }}">
			window.addEventListener('alert', event => {
				toast.fire({
					icon: event.detail.type,
					title: event.detail.message ?? '',
				});
			});
		</script>
	@endpush
</section>

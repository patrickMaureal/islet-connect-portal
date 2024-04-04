<div class="islet-line">
	<img src="{{ asset('img/homepage/islet-profile/islet-line.svg') }}" alt="" class="img-fluid">
</div>

<section id="islets" class="faq">

  <div class="container-fluid" data-aos="fade-up">

    <div class="row gy-4">

      <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

        <div class="content px-xl-5">
          <h3>ISLETS</h3>
          <p>
            The list of islets that the project have been successfully implemented.
          </p>
					<a href="{{ route('search-islets.index') }}" class="btn-browse-islets">Browse Islets</a>
        </div>
      </div>
    </div>
		<div class="row justify-content-center my-5">
			<div class="col-lg-8">
				<h4>Browse Other Islets</h4>
				<div id="carouselExampleControls" class="carousel">
					<div class="carousel-inner">
						@forelse ($islets as $key => $islet)
							@php
								$coverPhoto = $islet->getMedia('cover_photos')[0];
								$activeClass = $key === 0 ? 'active' : ''; // Add 'active' class to the first item only
							@endphp
							<div class="carousel-item {{ $activeClass }}">
								<div class="img-wrapper">
									<div class="card text-white">
										<a class="carousel-img" href="{{ route('search-islets.islet-profile', $islet->id) }}">
											<img src="{{ $coverPhoto->getUrl() }}" class="card-img" alt="...">
											<div class="card-img-overlay">
												<p class="card-footer">{{ $islet->name }}</p>
											</div>
										</a>
									</div>
								</div>
							</div>
						@empty
							<div class="col-xl-12 col-md-12">
								<h4 class="text-center">No record found.</h4>
							</div>
						@endforelse
					</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>

				</div>
			</div>
		</div>

	</div>

	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/theme/home/carousel.js') }}"></script>
	@endpush
</section>

<div class="islet-border">
</div>


<div>
	@push('styles')
		<link href="{{ asset('css/page/islet/custom.css') }}" rel="stylesheet" type="text/css">
	@endpush
	{{-- hero --}}
	<section id="hero-static-islet" class="hero-static-islet d-flex align-items-start">
		<div class="container d-flex flex-column align-items-start position-relative mt-5" data-aos="zoom-out">
			<h2>Search Islet</h2>
			<p>Explore stunning islets adorned with pristine beaches and vibrant marine life, offering a serene escape and captivating natural beauty. Embrace tranquility and marvel at the allure of these secluded paradises, perfect for indulging in moments of pure bliss.</p>
			<div class="d-flex mb-5">
				<a href="#islets" class="btn-get-started scrollto">Learn More</a>
			</div>
		</div>
	</section>

	{{-- blue bg-line --}}
	<div class="search-islet-line">
		<img src="{{ asset('img/search-islets/islet-line.png') }}" alt="" class="img-fluid">
	</div>

	{{-- islet carousel --}}
	<section id="islets" class="browse-islet">
		<div class="container-fluid" data-aos="fade-up">

			<div class="row justify-content-center">
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
	</section>

	{{-- orange bg-line
	<div class="about-islet-line">
		<img src="{{ asset('img/search-islets/about-line.png') }}" alt="" class="img-fluid">
	</div> --}}

	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/theme/home/carousel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/theme/home/search-islet.js') }}"></script>
	@endpush
</div>

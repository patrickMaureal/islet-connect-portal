<x-home-layout>

	@push('styles')
		<style>
			.swiper {
      width: 100%;
      height: 488px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

		@media (max-width: 576px) {
			.swiper {
				height: 230px;
			}
		}
		</style>
	@endpush

	{{-- hero --}}
	<section id="hero-static-islet" class="hero-static-islet d-flex align-items-start">
		<div class="container d-flex flex-column align-items-start position-relative mt-5" data-aos="zoom-out">
			<h2>{{ $islet->name }}</h2>
			<p>{{ $islet->description }}</p>
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
							@forelse ($islets as $key => $browseIslet)
								@php
									$coverPhoto = $browseIslet->getMedia('cover_photos')[0];
									$activeClass = $key === 0 ? 'active' : ''; // Add 'active' class to the first item only
								@endphp
								<div class="carousel-item {{ $activeClass }}">
									<div class="img-wrapper">
										<div class="card text-white">
											<a class="carousel-img" href="{{ route('search-islets.islet-profile', $browseIslet->id) }}">
												<img src="{{ $coverPhoto->getUrl() }}" class="card-img" alt="...">
												<div class="card-img-overlay">
													<p class="card-footer">{{ $browseIslet->name }}</p>
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

	{{-- orange bg-line --}}
	<div class="about-islet-line">
		<img src="{{ asset('img/search-islets/about-line.png') }}" alt="" class="img-fluid">
	</div>

	{{-- about islet --}}
	<section class="about-islet" id="about-islet">
		<div class="container-fluid" data-aos="fade-up">
			<h2>About {{ $islet->name }}</h2>
			<p>Enjoy the scenic view of the ocean. Take a quick underwater adventure and discover the colorful marine life. Partake in the fresh catch and local produce. Take home quality products that boast of world-class craftsmanship.</p>

			<!-- Swiper  Carousel-->
			<div class="swiper mySwiper">
				<div class="swiper-wrapper">
					@foreach ($islet->getMedia('profiles') as $media)
						<div class="swiper-slide">
							<img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" />
						</div>
					@endforeach
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>

			<div class="external-controls">
				<ul class="control-list">
					<li>
						<a href="#profile" class="control-button profile active">Profile</a>
					</li>
					<li>
						<a href="#activities" class="control-button activities">Activities</a>
					</li>
					<li>
						<a href="#map" class="control-button islet-map" id="mapButton">Map</a>
					</li>

					<li>
						<a href="#portfolio" class="control-button portfolio" id="portfolioButton">Gallery</a>
					</li>
				</ul>
			</div>


			<div class="about-content">
				<div class="about-islet-profile mt-4" id="profile">
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-3">
									<h2>Islet Profile</h2>
								</div>
								<div class="col-lg-9">
									<div class="row">
										<div class="col-lg-12">
											<p>Total population : {{ $islet->total_population }}</p>
										</div>
										<div class="col-lg-12">
											<p>The island is located at Brgy. {{ $address->full_address }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="about-islet-activities d-none" id="activities">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-2">
									<h2>Islet Activities</h2>
								</div>
								<div class="col-lg-10">
									<div class="row">
										@foreach ($islet->activities as $item)

										<div class="col-lg-12">
											<p><strong>{{ $item->activity }} .</strong> {{ $item->description }}.</p>
										</div>

										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="about-islet-map d-none" id="islet-map">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-2">
									<h2>Islet <br>Map</h2>
								</div>
							</div>
							<div class="map">
								<div id="map" style="height: 400px !important; z-index: 0; border-radius: 15px"></div>
							</div>
						</div>
					</div>
				</div>

				<section id="portfolio" class="portfolio d-none" data-aos="fade-up">

					<div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

						<div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

							<div class="row g-0 portfolio-container">
								@foreach ($islet->activities as $activity)
									@php
										$id = $loop->iteration;
									@endphp
									@foreach ($activity->media as $media)
										<div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-{{ $id }}">
											<img src="{{ $media->getUrl() }}" class="img-fluid" alt="{{ $media->name }}">
										</div>
									@endforeach
								@endforeach
							</div><!-- End Portfolio Container -->

							<ul class="portfolio-flters">
								<li data-filter="*" class="filter-active">All</li>
								@foreach ($islet->activities as $activity)
									<li data-filter=".filter-{{ $loop->iteration }}">{{ $activity->activity }}</li>
								@endforeach
							</ul><!-- End Portfolio Filters -->
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>

	@push('scripts')
		<script nonce="{{ csp_nonce() }}">
			let mapInitialized = false; // indicates a flag that the map is not yet initialized

			$(document).ready(function() {
				$("#mapButton").click(function(e) {
					if (!mapInitialized) {
            initializeMap();
            mapInitialized = true; // Set the flag to true indicating that the map has been initialized
        	}
				})
			})

			function initializeMap() {

				// data
				let latitude = {{ $islet->latitude }};
				let longitude = {{ $islet->longitude }};
				let name = '{{ $islet->name }}';
				let zoom = 12;

				// icon
				let icon = L.icon({
						iconUrl: '/img/boat/boat.png',
						iconSize:     [38, 50], // size of the icon
						iconAnchor:   [22, 40], // point of the icon which will correspond to marker's location
						popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
				});

				// map view
				let map = L.map('map').setView([latitude, longitude], zoom);

				// attributes base on Use Policy
				L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
					maxZoom: 16,
					minZoom: 10,
					attribution: '<a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a> | <a href="https://www.openstreetmap.org/fixthemap" target="_blank">FixTheMap</a>'
				}).addTo(map);

				// map bind
				L.marker([latitude, longitude], {icon: icon}).addTo(map).bindPopup(name);

				// Trigger resize event on map container to force redraw
				setTimeout(function() {
       	 map.invalidateSize();
				}, 100);
			}

		</script>
		<script type="text/javascript" src="{{ asset('js/theme/home/carousel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/theme/home/search-islet.js') }}"></script>
	@endpush

</x-home-layout>

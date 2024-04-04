<x-booking-layout>
  <section class="d-flex align-items-center">
    <div class="container my-7">
      <div class="row justify-content-center">
        <livewire:booking-wizard />
      </div>
    </div>
  </section>
	@push('styles')
		<link rel="stylesheet" href="{{ asset('css/theme/home/booking.css') }}">
	@endpush
</x-booking-layout>

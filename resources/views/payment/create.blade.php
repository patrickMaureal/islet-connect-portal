<x-app-layout>
  {{-- Header --}}
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-md-0">
      <h2 class="h4">Add Payment</h2>
    </div>
  </div>

  {{-- card body --}}
	<livewire:payment.unpaid-booking-selection />

	@push('styles')
		@livewireStyles(['nonce' => csp_nonce()])
	@endpush

	@push('scripts')
		@livewireScripts(['nonce' => csp_nonce()])
	@endpush

</x-app-layout>

<x-app-layout>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Revenue</h2>
		</div>
		<div class="btn-toolbar mb-2 mb-md-0">

			{{-- form  --}}
			<form action="{{ route('analytics.revenues.print') }}" method="POST" target="_blank">
				@csrf

				<input type="hidden" id="chart-image" name="chart_image">
				<button type="submit"  class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" id="printRevenue" disabled>
					<i class="icon icon-xs me-2 bi bi-printer-fill"></i>
					Print
				</button>

			</form>
		</div>
	</div>
	<div class="form-group mb-2">
		<label for="yearFilter">Select Year:</label>
		<select class="form-select fmxw-200 d-md-inline" id="yearFilter">
			@foreach($years as $year)
				<option value="{{ $year }}">{{ $year }}</option>
			@endforeach
		</select>
	</div>
	<div class="card border-0 shadow mb-5">
		<div class="card-body p-2">
			<div id="reportPage">
				<div class="chart-container">
					<canvas id="myChart"></canvas>
				</div>
			</div>
		</div>
	</div>
	@push('styles')
		<link rel="stylesheet" href="{{ asset('css/page/analytics/index.css') }}">
	@endpush
	@push('scripts')
		<script type="module" src="{{ asset('js/page/analytics/revenue/index.js') }}"></script>
	@endpush
</x-app-layout>

@push('styles')
	<style>
		.nav-pills .nav-link.active {
			color: #262424;
		}

		.nav-pills .nav-link.previous {
			background-color: #23AAE1;
			color: #ffffff;
		}
	</style>
@endpush


<div class="nav-wrapper position-relative mb-2">
	<div class="nav-line"></div>
	<ul class="nav nav-pills nav-fill flex-column flex-md-row justify-content-evenly" id="tabs-text" role="tablist">
		@foreach ($steps as $step)
			<li class="nav-item">
				<a @if ($step->isPrevious()) wire:click="{{ $step->show() }}" @endif class="nav-link mb-sm-3 mb-md-0 {{ $step->isCurrent() ? 'active' : '' }} {{ $step->isPrevious() ? 'previous' : '' }}" href="#" role="tab" aria-selected="true">
					@if ($step->isCurrent())
						<i class="fa-solid fa-chevron-down"></i>
					@elseif ($step->isPrevious())
						<i class="fa-solid fa-check"></i>
					@else
						<i class="{{ $step->icon }}"></i>
					@endif
				</a>
			</li>
		@endforeach
	</ul>
</div>

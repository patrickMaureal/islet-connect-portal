<div>


	<div class="col-12 d-flex align-items-center justify-content-center">
		<div class="bg-gray-100 shadow border-0 rounded border-light p-4 p-lg-5 w-100">
			@include('components.booking-wizard-navigation')
			<div class="text-center text-md-center mb-4 mt-md-0">
				<h1 class="mb-0 h3">Pumpboat Selection</h1>
			</div>

			<div class="row">
				<div class="col-md-6">
          <div class="card border-0 shadow">
            <div class="card-body">
              <label for="searchPumpboat" class="mb-3">Select Pumpboat</label>
              <input type="text" class="form-control mb-2" id="searchPumpboat" wire:model.live.debounce.250ms="searchPumpboat" placeholder="Search pumpboat...">
              <ul class="list-group list-group-flush list my--3">

                @forelse ($pumpboats as $pumpboat)
                  <li class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto ms--2">
                        <h4 class="h6 mb-0">
                          {{ $pumpboat->name }}
                        </h4>
                      </div>
                      <div class="col text-end">
                        <button class="btn-select d-inline-flex align-items-center" wire:click="selectPumpboat('{{ $pumpboat->id }}')">
                          Select
                        </button>
                      </div>
                    </div>
                  </li>
                @empty
                  <li class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="">
                        <h4 class="h6 mb-0 text-center">
                          No data.
                        </h4>
                      </div>
                    </div>
                  </li>
                @endforelse

              </ul>
            </div>
          </div>
				</div>
				<div class="col-md-6 mt-2 mt-md-0">
          @if ( isset($selectedPumpboat) )
            <div class="card card-body border-0 shadow mb-4 mb-xl-0">
              <h2 class="h5 mb-4">{{ $selectedPumpboat['name'] }}</h2>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                      <h3 class="h6 mb-1">Total Passenger Capacity</h3>
                      <p class="small pe-4">{{ $selectedPumpboat['total_passenger_capacity'] }}</p>
                    </div>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                      <h3 class="h6 mb-1">Registration Number</h3>
                      <p class="small pe-4">{{ $selectedPumpboat['reg_number'] }}</p>
                    </div>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                      <h3 class="h6 mb-1">Hull Material</h3>
                      <p class="small pe-4">{{ $selectedPumpboat['hull_material'] }}</p>
                    </div>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                      <h3 class="h6 mb-1">Safety Equipment</h3>
                      <p class="small pe-4">{{ $selectedPumpboat['safety_equipment'] }}</p>
                    </div>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                    <div>
                      <h3 class="h6 mb-1">Amenities</h3>
                      <p class="small pe-4">{{ $selectedPumpboat['amenities'] }}</p>
                    </div>
                  </li>
              </ul>
            </div>
          @endif
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 col-lg-12">
				</div>
				<div class="col-md-7 col-lg-12">
				</div>
			</div>

			<div class="mt-5">
				<button type="button" class="btn-previous" wire:click="previousStep">Previous</button>
        @if ( isset($selectedPumpboat) )
				  <button type="button" class="btn-next" wire:click="nextStep">Next</button>
        @endif
			</div>

		</div>
	</div>

</div>

<div>


  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100">
      <div class="text-center text-md-center mb-4 mt-md-0">
        <h1 class="mb-0 h3">Islet Selection</h1>
      </div>

      <div class="row">
        <div class="col-md-12 col-lg-5">
          <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
              <h2 class="fs-5 fw-bold mb-0">Search multiple Islets</h2>
            </div>
            <div class="card-body">
              <input type="text" class="form-control mb-2" wire:model.live.debounce.250ms="search" placeholder="Search islet...">
              <ul class="list-group list-group-flush list my--3">

                @forelse ($islets as $islet)
                  <li class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto ms--2">
                        <h4 class="h6 mb-0">
                          {{ $islet->name }}
                        </h4>
                      </div>
                      <div class="col text-end">
                        <button class="btn-select d-inline-flex align-items-center" wire:click="add('{{ $islet->id }}')">
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
        <div class="col-md-12 col-lg-6 mt-2 mt-md-0">
          <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
              <h2 class="fs-5 fw-bold mb-0">Selected Islets</h2>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush list my--3">

                @forelse ($selectedIslets as $selectedIslet)
                  <li class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto ms--2">
                        <h4 class="h6 mb-0">
                          {{ $selectedIslet['name'] }}
                        </h4>
                      </div>
                      <div class="col text-end">
                        <button class="btn-select d-inline-flex align-items-center" wire:click="remove('{{ $selectedIslet['id'] }}')">
                          Remove
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
      </div>

     <div class="mt-5">
        <button type="button" class="btn-previous" wire:click="previousStep">Previous</button>
        @if ( count($selectedIslets)  > 0)
          <button type="button" class="btn-next" wire:click="nextStep">Next</button>
        @endif
      </div>
    </div>
  </div>

</div>

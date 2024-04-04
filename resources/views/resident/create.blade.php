<x-app-layout>
  {{-- Header --}}
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-md-0">
      <h2 class="h4">Add Resident Profile</h2>
    </div>
  </div>
  {{-- card body --}}
  <div class="row mb-4">
    <div class="col-12 col-xl-12">
      <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">Resident Information</h2>
        <form method="POST" action="{{ route('residents.store') }}">
          @csrf
          {{-- fname, mname, lname --}}
          <div class="row mb-2 py-2">
            <div class="col-md-4">
              <div class="form-group">
                <label for="first_name">First Name <x-asterisks /> </label>
                <input class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"
                  type="text" placeholder="First name" value="{{ old('first_name') }}" required>
                @error('first_name')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input class="form-control @error('middle_name') is-invalid @enderror" id="middle_name"
                  name="middle_name" type="text" placeholder="Middle name" value="{{ old('middle_name') }}">
                @error('middle_name')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="last_name">Last Name <x-asterisks /> </label>
                <input class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"
                  type="text" placeholder="Last name" value="{{ old('last_name') }}" required>
                @error('last_name')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
          </div>
          {{-- nextension, prefix, gender --}}
          <div class="row mb-2 py-2">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name_extension">Name Extension <x-asterisks /> </label>
                <select class="form-control form-select selectpicker @error('name_extension') is-invalid @enderror" id="name_extension"
                  name="name_extension" type="text" aria-label="Name Extension" data-live-search="true" title="Choose Name Extension" required>
                  @foreach (config('constants.name_extensions') as $extension)
                  <option value="{{ $extension }}" {{ old('name_extension')==$extension ? 'selected' : '' }}>
                    {{ $extension }}</option>
                  @endforeach
                </select>
                @error('name_extension')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="name_extension">Prefix <x-asterisks /> </label>
                <select class="form-control form-select selectpicker @error('prefix') is-invalid @enderror" id="prefix" name="prefix"
                  type="text" aria-label="Prefix" data-live-search="true" title="Choose Prefix" required>
                  @foreach (config('constants.prefix') as $prefix)
                  <option value="{{ $prefix }}" {{ old('prefix')==$prefix ? 'selected' : '' }}>
                    {{ $prefix }}</option>
                  @endforeach
                </select>
                @error('prefix')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="gender">Gender <x-asterisks /> </label>
                <select class="form-control form-select selectpicker @error('gender') is-invalid @enderror" id="gender" name="gender"
                  type="text" aria-label="Gender" data-live-search="true" title="Choose Gender" required>
                  @foreach (config('constants.gender') as $gender)
                  <option value="{{ $gender }}" {{ old('gender')==$gender ? 'selected' : '' }}>
                    {{ $gender }}</option>
                  @endforeach
                </select>
                @error('gender')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
          </div>
          {{-- email, contact number --}}
          <div class="row mb-2 py-2">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email <x-asterisks /> </label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text"
                  placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="contact">Contact Number<x-asterisks /> </label>
                <input class="form-control @error('contact_number') is-invalid @enderror" id="contact_number"
                  name="contact_number" type="number" min="11" placeholder="Contact Number"
                  value="{{ old('contact_number') }}">
                @error('contact_number')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
          </div>
          {{-- btype, phy-status --}}
          <div class="row mb-2 py-2">
            <div class="col-md-6">
              <div class="form-group">
                <label for="bloodtype">Blood Type <x-asterisks /> </label>
                <select class="form-control form-select selectpicker @error('bloodtype') is-invalid @enderror" id="bloodtype"
                  name="bloodtype" aria-label="Blood Type" data-live-search="true" title="Choose Blood Type" required>
                  @foreach (config('constants.bloodtype') as $bloodtype)
                  <option value="{{ $bloodtype }}" {{ old('bloodtype')==$bloodtype ? 'selected' : '' }}>
                    {{ $bloodtype }}</option>
                  @endforeach
                </select>
                @error('bloodtype')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="physical_status">Physical Status <x-asterisks /> </label>
                <select class="form-control form-select selectpicker @error('physical_status') is-invalid @enderror" id="physical_status"
                  name="physical_status" aria-label="Physical Status" data-live-search="true" title="Choose Physical Status" required>
                  @foreach (config('constants.physical_status') as $physical_status)
                  <option value="{{ $physical_status }}" {{ old('physical_status')==$physical_status ? 'selected' : ''
                    }}> {{ $physical_status }}
                  </option>
                  @endforeach
                </select>
                @error('physical_status')
                <x-input-error message="{{ $message }}" />
                @enderror

              </div>
            </div>
          </div>
          {{-- bplace, bdate --}}
          <div class="row mb-2 py-2">
            <div class="col-md-6">
              <div class="form-group">
                <label for="birthplace">Birth Place <x-asterisks /> </label>
                <input class="form-control @error('birthplace') is-invalid @enderror" id="birthplace" name="birthplace"
                  type="text" placeholder="Birth Place" value="{{ old('birthplace') }}" required>
                @error('birthplace')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <label for="birthdate">Birthday <x-asterisks /> </label>
              <div class="input-group">
                <span class="input-group-text">
                  <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                      clip-rule="evenodd">
                    </path>
                  </svg>
                </span>
                <input class="form-control datepicker-input  @error('birthdate') is-invalid @enderror" id="birthdate"
                  type="date" placeholder="yyyy-mm-dd" name="birthdate" fdprocessedid="1fw4ed"
                  value="{{ old('birthdate') }}" required>
                @error('birthdate')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
          </div>
          {{-- marital status, employment status --}}
          <div class="row mb-2 py-2">
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="employment_status">Employment Status <x-asterisks /> </label>
                <select class="form-control form-select selectpicker @error('employment_status') is-invalid @enderror" id="employment_status"
                  name="employment_status" aria-label="Employment Status" data-live-search="true" title="Choose Employment Status" required>
                  @foreach (config('constants.employment_status') as $employment_status)
                  <option value="{{ $employment_status }}" {{ old('employment_status')==$employment_status ? 'selected'
                    : '' }}>
                    {{ $employment_status }}</option>
                  @endforeach
                </select>
                @error('employment_status')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="marital_status">Marital Status <x-asterisks /> </label>
                <select class="form-control form-select selectpicker @error('marital_status') is-invalid @enderror" id="marital_status"
                  name="marital_status" aria-label="Marital Status" data-live-search="true" title="Choose Marital Status" required>
                  @foreach (config('constants.marital_status') as $marital_status)
                  <option value="{{ $marital_status }}" {{ old('marital_status')==$marital_status ? 'selected' : '' }}>
                    {{ $marital_status }}
                  </option>
                  @endforeach
                </select>
                @error('marital_status')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
          </div>
          {{-- evacuation-center --}}
          <div class="row mb-2 py-2">
            <div class="col-md-6">
              <div class="form-group">
                <label for="evacuation_center">Evacuation Center <x-asterisks /> </label>
                <input class="form-control @error('evacuation_center') is-invalid @enderror" id="evacuation_center"
                  name="evacuation_center" type="text" placeholder="Evacuation Center"
                  value="{{ old('evacuation_center') }}" required>
                @error('evacuation_center')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
          </div>

					{{-- address --}}
					<x-address />

          {{-- button --}}
          <div class="mt-3">
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
            <a href="{{ route('residents.index') }}" button class="btn btn-gray-800 mt-2 animate-up-2"
              type="submit">Back</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>

</x-app-layout>

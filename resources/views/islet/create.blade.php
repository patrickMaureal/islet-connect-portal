<x-app-layout>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-md-0">
            <h2 class="h4">Add an islet</h2>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 col-xl-12">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Islet Information</h2>

                <form method="POST" action="{{ route('islets.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="name">Name
                                    <x-asterisks />
                                </label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" type="text" placeholder="Name" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <x-input-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="total_population">Total Population
                                    <x-asterisks />
                                </label>
                                <input class="form-control @error('total_population') is-invalid @enderror"
                                    id="total_population" name="total_population" type="number" min="3"
                                    placeholder="Total Population" value="{{ old('total_population') }}" required>
                                @error('total_population')
                                    <x-input-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="latitude">Latitude
                                    <x-asterisks />
                                </label>
                                <input class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                                    name="latitude" type="text" placeholder="Latitude" value="{{ old('latitude') }}"
                                    required>
                                @error('latitude')
                                    <x-input-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="longitude">Longitude
                                    <x-asterisks />
                                </label>
                                <input class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                                    name="longitude" type="text" placeholder="Longitude"
                                    value="{{ old('longitude') }}" required>
                                @error('longitude')
                                    <x-input-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="description">Description
                                    <x-asterisks />
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    type="text" placeholder="Description" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <x-input-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- address --}}
										@role('Administrator')
                    	<x-address :exclude-street="true" />
										@else
											<x-address :disableRegion="true" :disableProvince="true" :disableMunicipality="true" :region="auth()->user()->region" :province="auth()->user()->province" :municipality="auth()->user()->municipality" :exclude-street="true" />
										@endrole

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="file">Upload attachments:
                                    <x-asterisks />
                                </label>
                                <input class="form-control  @error('file') is-invalid @enderror" id="file"
                                    name="file[]" multiple type="file" placeholder="File" required>
                                @error('file')
                                    <x-input-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="cover_photo">Upload cover photo:
                                    <x-asterisks />
                                </label>
                                <input class="form-control  @error('cover_photo') is-invalid @enderror" id="cover_photo"
                                    name="cover_photo" type="file" placeholder="Cover Photo" required>
                                @error('cover_photo')
                                    <x-input-error message="{{ $message }}" />
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
                        <a href="{{ route('islets.index') }}" button class="btn btn-gray-800 mt-2 animate-up-2"
                            type="submit">Back</button></a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>

<div class="card card-body border-0 shadow mb-4">
    <h2 class="h5 mb-4">Profile Information</h2>

    <form method="POST" action="{{ route('profile.update') }}">

        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="name">Name
                        <x-asterisks />
                    </label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        type="text" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <x-input-error message="{{ $message }}" />
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="email">Email
                        <x-asterisks />
                    </label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        type="email" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <x-input-error message="{{ $message }}" />
                    @enderror
                </div>
            </div>

        </div>

        <div class="mt-3">
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
        </div>

    </form>

</div>

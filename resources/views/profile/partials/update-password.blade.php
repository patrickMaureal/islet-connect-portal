<div class="card card-body border-0 shadow mb-4">
    <h2 class="h5 mb-4">Update Password</h2>

    <form method="POST" action="{{ route('password.update') }}">

        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="current_password">Current Password
                        <x-asterisks />
                    </label>
                    <input class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                        name="current_password" type="password" placeholder="Current Password" required>
                    @error('current_password')
                        <x-input-error message="{{ $message }}" />
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="password">New Password
                        <x-asterisks />
                    </label>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                        type="password" placeholder="New Password" required>
                    @error('password')
                        <x-input-error message="{{ $message }}" />
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password
                        <x-asterisks />
                    </label>
                    <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Confirm Password" required>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
        </div>

    </form>

</div>

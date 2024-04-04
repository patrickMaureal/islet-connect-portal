<x-guest-layout>
	@push('styles')
		<link rel="stylesheet" href="{{ asset('css/theme/admin/login.css') }}">
	@endpush
  <section class="d-flex align-items-center justify-content-center sea-bg">
    <div class="container my-8">
      <div class="row justify-content-center form-bg-image">
        <div class="col-12 d-flex align-items-center justify-content-center">
					<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
            <div class="text-center text-md-center mb-4 mt-md-0">
              <h1 class="mb-0">Sign in to our platform</h1>
          	</div>

						{{-- Session Status --}}
						<x-auth-session-status class="alert-success" :status="session('status')" />

						<form method="POST" action="{{ route('login') }}" class="mt-4">

							@csrf

							<div class="form-group mb-4">
									<label for="email">Your Email
											<x-asterisks />
									</label>
									<div class="input-group">
											<span class="input-group-text" id="basic-addon1">
													<i class="icon-xs text-gray-600 bi bi-envelope-at-fill"></i>
											</span>
											<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
													placeholder="example@company.com" id="email" value="" autofocus>
											@error('email')
													<x-input-error message="{{ $message }}" />
											@enderror
									</div>
							</div>

							<div class="form-group">
									<div class="form-group mb-4">
											<label for="password">Your Password
													<x-asterisks />
											</label>
											<div class="input-group">
													<span class="input-group-text" id="basic-addon2">
															<i class="icon icon-xs text-gray-600 bi bi-shield-lock-fill"></i>
													</span>
													<input type="password" name="password" placeholder="Password"
															class="form-control @error('password') is-invalid @enderror" id="password" value="">
													@error('password')
															<x-input-error message="{{ $message }}" />
													@enderror
											</div>
									</div>

							</div>

							<div class="d-grid">
									<button type="submit" class="btn-signin">Sign in</button>
							</div>

						</form>

						<div class="mt-3 mb-4 text-center">
							<span class="fw-normal">
								<a href="{{ route('password.request') }}" class="forgot-password">Forgot Password</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
  </section>
</x-guest-layout>

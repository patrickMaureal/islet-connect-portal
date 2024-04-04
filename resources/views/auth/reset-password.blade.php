<x-guest-layout>
	@push('styles')
		<style>
			section {
				background: #0F75BC;
			}
			h1 {
				color: #262424;
				font-family: var(--font-secondary);
				font-size: 1.5rem;
				text-align: center;
			}
			label {
				color: #262424;
				font-family: var(--font-secondary);
			}

			.btn-recover {
				font-size: 15px;
				font-weight: 500;
				color: var(--color-white);
				background: #F7901F;
				padding: 0.5rem 3rem;
				margin: 10px;
				border-radius: 0.5rem;
				transition: 0.3s;
				font-family: var(--font-secondary);
				border: none;
				user-select: none;
				transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
			}

			.signin {
				font-size: 15px;
				font-weight: 500;
				font-family: var(--font-secondary);
				color: #3E3E3E;
			}

		</style>
	@endpush
	<section class="vh-lg-100 d-flex align-items-center justify-content-center sea-bg">
		<div class="container my-8">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h1>Reset Password</h1>
							<form method="POST" action="{{ route('password.store') }}">
								@csrf

								<!-- Password Reset Token -->
								<input type="hidden" name="token" value="{{ $request->route('token') }}">

								<!-- Email Address -->
								<div class="mb-4">
										<label for="email">Email
												<x-asterisks />
										</label>
										<div class="input-group">
												<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
														id="email" value="{{ old('email', $request->email) }}" required autofocus
														autocomplete="username">
												@error('email')
														<x-input-error message="{{ $message }}" />
												@enderror
										</div>
								</div>
								<div class="mb-4">
										<label for="password">Password
												<x-asterisks />
										</label>
										<div class="input-group">
												<input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
														id="password" required autocomplete="new-password" placeholder="New Password">
												@error('password')
														<x-input-error message="{{ $message }}" />
												@enderror
										</div>
								</div>
								<div class="mb-4">
										<label for="password_confirmation">Confirm Password
												<x-asterisks />
										</label>
										<div class="input-group">
												<input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
														required autocomplete="new-password">
										</div>
								</div>

								<div class="d-flex justify-content-center align-items-center mt-4">
										<button type="submit" class="btn-recover">Submit</button>
								</div>
							</form>
							<div class="mt-3 mb-4 text-center">
								<span class="fw-normal">
									<a href="{{ route('login') }}" class="signin">Sign in to our platform</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</x-guest-layout>

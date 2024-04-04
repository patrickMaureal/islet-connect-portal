<x-guest-layout>
	@push('styles')
		<style>
			main {
				background: #0F75BC;
			}

			p {
				color: #262424;
				font-family: var(--font-secondary);
				font-size: 0.9rem;
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
				padding: 0.5rem 1rem;
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
							<p class="mb-4">
								Forgot your password? No problem. Just let us know your email address and we will email you a password reset
								link that will allow you to choose a new one.
							</p>
							<form method="POST" action="{{ route('password.email') }}">
								@csrf
								<div class="mb-4">
									<label for="email">Your Email</label>
									<div class="input-group">
										<input type="email" name="email" class="form-control" id="email" placeholder="example@example.com" required autofocus>
									</div>
								</div>
								<div class="d-grid">
									<button type="submit" class="btn-recover">Recover password</button>
								</div>
							</form>
							<div class="mt-3 mb-4 text-center">
								<span class="fw-normal">
									<a href="{{ route('login') }}" class="signin">Sign In to our platform</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</x-guest-layout>

<x-guest-layout>
	@push('styles')
		<style>
			p {
				color: #262424;
				font-family: var(--font-secondary);
				font-size: 0.9rem;
			}
			main {
				background: #0F75BC;
			}

			.btn-verify {
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

			.btn-logout {
				font-size: 15px;
				font-weight: 500;
				color: var(--color-white);
				background: #0F75BC;
				padding: 0.5rem 1rem;
				margin: 10px;
				border-radius: 0.5rem;
				transition: 0.3s;
				font-family: var(--font-secondary);
				border: none;
				user-select: none;
				transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
			}

			.btn-back {
				font-size: 22px;
				font-weight: 500;
				color: var(--color-white);
				transition: 0.3s;
				font-family: var(--font-primary);
				border: none;
			}

			.btn-back:hover {
				color: var(--color-white);
			}
		</style>
	@endpush
	{{-- Section --}}
	<section class="vh-lg-100 d-flex align-items-center justify-content-center sea-bg">
		<div class="container my-8">
			<div class="row justify-content-center">
				<div class="col-12 d-flex align-items-center justify-content-center">
					<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">

						<div class="mb-4">
							<p>
								Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
							</p>
						</div>

						@if (session('status') === 'verification-link-sent')
							<x-auth-session-status class="alert-success" :status="'A new verification link has been sent to the email address you provided during registration.'" />
						@endif
						{{-- Session Status --}}

						<form method="POST" action="{{ route('verification.send') }}">
							@csrf

							<div class="d-grid mb-1">
								<button type="submit" class="btn-verify">Resend Verification Email</button>
							</div>
						</form>
						<form method="POST" action="{{ route('logout') }}">
							@csrf

							<div class="d-grid mb-3">
								<button type="submit" class="btn-logout">Log Out</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>

</x-guest-layout>

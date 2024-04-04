<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Livewire\Booking\Wizard\BookingWizardComponent;
use App\Livewire\Booking\Wizard\Steps\IsletSelection;
use App\Livewire\Booking\Wizard\Steps\PassengerProfile;
use App\Livewire\Booking\Wizard\Steps\PumpboatSelection;
use App\Livewire\Booking\Wizard\Steps\Summary;
use App\Livewire\Booking\Wizard\Steps\Schedule;
use App\Livewire\Mobile\Booking\Wizard\MobileBookingWizardComponent;
use App\Livewire\Mobile\Booking\Wizard\Steps\IsletSelection as StepsIsletSelection;
use App\Livewire\Mobile\Booking\Wizard\Steps\PassengerProfile as StepsPassengerProfile;
use App\Livewire\Mobile\Booking\Wizard\Steps\PumpboatSelection as StepsPumpboatSelection;
use App\Livewire\Mobile\Booking\Wizard\Steps\Schedule as StepsSchedule;
use App\Livewire\Mobile\Booking\Wizard\Steps\Summary as StepsSummary;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
    if ($this->app->environment('local')) {
			$this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
			$this->app->register(TelescopeServiceProvider::class);
    }

		// livewire form wizard
		Livewire::component('booking-wizard', BookingWizardComponent::class);

		// livewire form steps
		Livewire::component('schedule-selection-step', Schedule::class);
		Livewire::component('islet-selection-step', IsletSelection::class);
		Livewire::component('passenger-profile-step', PassengerProfile::class);
		Livewire::component('pumpboat-selection-step', PumpboatSelection::class);
		Livewire::component('summary-step', Summary::class);

		// livewire form wizard
		Livewire::component('mobile-booking-wizard', MobileBookingWizardComponent::class);

		// livewire form steps
		Livewire::component('mobile-schedule-selection-step', StepsSchedule::class);
		Livewire::component('mobile-islet-selection-step', StepsIsletSelection::class);
		Livewire::component('mobile-passenger-profile-step', StepsPassengerProfile::class);
		Livewire::component('mobile-pumpboat-selection-step', StepsPumpboatSelection::class);
		Livewire::component('mobile-summary-step', StepsSummary::class);

	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		//
	}
}

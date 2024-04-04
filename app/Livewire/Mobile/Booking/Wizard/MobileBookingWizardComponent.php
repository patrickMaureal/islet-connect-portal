<?php

namespace App\Livewire\Mobile\Booking\Wizard;

use App\Livewire\Mobile\Booking\Wizard\Steps\IsletSelection;
use App\Livewire\Mobile\Booking\Wizard\Steps\PassengerProfile;
use App\Livewire\Mobile\Booking\Wizard\Steps\PumpboatSelection;
use App\Livewire\Mobile\Booking\Wizard\Steps\Schedule;
use App\Livewire\Mobile\Booking\Wizard\Steps\Summary;
use Spatie\LivewireWizard\Components\WizardComponent;

class MobileBookingWizardComponent extends WizardComponent
{
  public function steps() : array
  {
    return [
      Schedule::class,
      IsletSelection::class,
			PassengerProfile::class,
      PumpboatSelection::class,
      Summary::class,
    ];       
  }
}

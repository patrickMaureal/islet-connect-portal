<?php

namespace App\Livewire\Booking\Wizard;

use App\Livewire\Booking\Wizard\Steps\IsletSelection;
use App\Livewire\Booking\Wizard\Steps\PassengerProfile;
use App\Livewire\Booking\Wizard\Steps\PumpboatSelection;
use App\Livewire\Booking\Wizard\Steps\Schedule;
use App\Livewire\Booking\Wizard\Steps\Summary;
use Spatie\LivewireWizard\Components\WizardComponent;
class BookingWizardComponent extends WizardComponent
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

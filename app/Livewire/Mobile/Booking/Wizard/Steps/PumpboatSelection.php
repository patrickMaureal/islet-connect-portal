<?php

namespace App\Livewire\Mobile\Booking\Wizard\Steps;

use Spatie\LivewireWizard\Components\StepComponent;
use Livewire\Attributes\Locked;

use App\Models\Pumpboat\Pumpboat;

class PumpboatSelection extends StepComponent
{
  public $searchPumpboat;

  #[Locked]
  public $selectedPumpboat;
  // public function stepInfo(): array
	// {
	// 	return [
	// 		'label' => 'Pumpboat',
	// 		'icon' => 'fa-solid fa-4',
	// 	];
	// }
	public function render()
	{
		return view('livewire.mobile.booking.wizard.steps.pumpboat-selection', [
      'pumpboats' => $this->filteredPumpboats()
		]);
	}

  private function filteredPumpboats()
  {

    // get the public state of the step 1
    $isletSelectionState = $this->state()->forStep('mobile-islet-selection-step'); // returns all state of the given step
    $selectedIsletsArray = $isletSelectionState['selectedIslets'];

		$passengerProfileState = $this->state()->forStep('mobile-passenger-profile-step');
		$passengerArray = $passengerProfileState['passengers'];

		$totalPassenger = count($passengerArray);

    // this array of selected islet id's will be use to filter the Pumpboats
    $selectedIslets = collect($selectedIsletsArray)->map(function ($islet) {
      return $islet['id'];
    })->all();

    // filter Pumpboat
    return Pumpboat::where('name', 'LIKE', "%{$this->searchPumpboat}%")
      ->with('routes', function ($query) use ($selectedIslets) {
        return $query->whereIn('islet_id', $selectedIslets);
      })
      ->whereHas('routes', function ($query) use ($selectedIslets) {
        return $query->whereIn('islet_id', $selectedIslets);
      })
      ->when($totalPassenger, function ($query) use ($totalPassenger) {
        return $query->where('total_passenger_capacity', '>=', $totalPassenger);
    	})
      ->select('id', 'name')
      ->limit(5)
      ->get();
  }

  public function selectPumpboat(Pumpboat $pumpboat)
  {
    $this->selectedPumpboat = $pumpboat;
    return $this->dispatch('alert', type:'success', message: 'Pumpboat selected.');
  }

  public function updatedTotalPassenger()
  {
    $this->selectedPumpboat = null;
    $this->filteredPumpboats();
  }
}

<?php

namespace App\Livewire\Mobile\Booking\Wizard\Steps;

use Spatie\LivewireWizard\Components\StepComponent;
use App\Models\Islet\Islet;

class IsletSelection extends StepComponent
{

  public $selectedIslets = [];
  public $search = '';
  // public function stepInfo(): array
	// {
	// 	return [
	// 		'label' => 'Islet',
	// 		'icon' => 'fa-solid fa-2',
	// 	];
	// }

	public function render()
	{
    $islets = Islet::where('name', 'LIKE', "%{$this->search}%")->select('id', 'name')->limit(5)->get();

		return view('livewire.mobile.booking.wizard.steps.islet-selection', [
      'islets' => $islets
		]);
	}

  public function add(Islet $islet)
  {
    foreach ($this->selectedIslets as $item) {
      if ($item['id'] == $islet->id) {
        return $this->dispatch('alert', type:'error', message: 'Islet already selected.');
      }
    }

    $this->selectedIslets[] = [
      'id' => $islet->id,
      'name' => $islet->name
    ];
    return $this->dispatch('alert', type:'success', message: 'Islet added.');
  }

  public function remove($selectedIslet)
  {
    foreach ($this->selectedIslets as $key => $item) {
      if ($item['id'] == $selectedIslet) {
        unset($this->selectedIslets[$key]);
        return $this->dispatch('alert', type:'success', message: 'Islet removed.');
      }
    }
  }
}

<?php

namespace App\Livewire\Booking\Wizard\Steps;

use Carbon\Carbon;
use Spatie\LivewireWizard\Components\StepComponent;


class Schedule extends StepComponent
{
  public $from_date;
  public $to_date;
  public $total_days;
	public $min_date;
	public $max_date;

  public function stepInfo(): array
	{
		return [
			'label' => 'Schedule',
			'icon' => 'fa-solid fa-1',
		];
	}
	public function render()
	{
    $this->total_days = Carbon::parse($this->to_date)->addDay()->diffInDays($this->from_date);
		$this->minAndmaxDate();
		return view('livewire.booking.wizard.steps.schedule');
	}

	private function minAndmaxDate(){
		$this->min_date = Carbon::now()->format('Y-m-d');
		$this->max_date = Carbon::now()->addYears(20)->format('Y-m-d');
	}
}

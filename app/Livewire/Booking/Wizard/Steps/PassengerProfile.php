<?php

namespace App\Livewire\Booking\Wizard\Steps;

use Livewire\Attributes\Locked;
use Spatie\LivewireWizard\Components\StepComponent;

class PassengerProfile extends StepComponent
{
  #[Locked]
  public $passengers = [];

  #[Locked]
  public $id;

  public $name;
  public $age;
  public $sex ='Male';
  public $nationality;
	public $address;
  public $pwd = 0;
  public function stepInfo(): array
	{
		return [
			'label' => 'Passenger',
			'icon' => 'fa-solid fa-3',
		];
	}
  public function render()
  {
    return view('livewire.booking.wizard.steps.passenger-profile');
  }

	private function clearForm()
	{
		// clear form
		$this->reset('name', 'age', 'sex', 'id', 'nationality','address', 'pwd');
	}

	public function add()
	{
    return $this->dispatch('open-passenger-form-modal');
	}

  public function store()
  {
    $newPassenger = [
      'id'					=> uniqid(),
      'name'  			=> $this->name,
      'age'   			=> $this->age,
      'sex'   			=> $this->sex,
      'nationality'	=> $this->nationality,
      'address'			=> $this->address,
      'pwd'   			=> $this->pwd,
    ];

    $this->passengers[] = $newPassenger;

		$this->clearForm();

    $this->dispatch('close-passenger-form-modal');
		$this->dispatch('alert', type:'success', message: 'Passenger has been successfully added.');

  }
  public function edit($passengerId)
  {
    $this->dispatch('open-passenger-form-modal');

    foreach ($this->passengers as $item) {
      if ($item['id'] == $passengerId) {

				$this->id = $item['id'];
        $this->name = $item['name'];
        $this->age = $item['age'];
        $this->sex = $item['sex'];
        $this->nationality = $item['nationality'];
        $this->address = $item['address'];
        $this->pwd = $item['pwd'];

      }
    }
  }

	public function update()
	{
    foreach ($this->passengers as $key => $item) {
      if ($item['id'] == $this->id) {

				$this->passengers[$key]['name'] = $this->name;
				$this->passengers[$key]['age'] 	= $this->age;
				$this->passengers[$key]['sex'] 	= $this->sex;
				$this->passengers[$key]['nationality'] 	= $this->nationality;
				$this->passengers[$key]['address'] 	= $this->address;
				$this->passengers[$key]['pwd'] 	= $this->pwd;

				$this->clearForm();

        $this->dispatch('close-passenger-form-modal');
        return $this->dispatch('alert', type:'success', message: 'Passenger has been successfully updated.');

      }
    }
	}

	public function delete($passengerId)
	{
    $this->dispatch('open-passenger-delete-modal');

    foreach ($this->passengers as $item) {
      if ($item['id'] == $passengerId) {
				$this->id = $item['id'];
      }
    }
	}

  public function destroy()
  {
    foreach ($this->passengers as $key => $item) {
      if ($item['id'] == $this->id) {

        unset($this->passengers[$key]);

				$this->clearForm();

				$this->dispatch('close-passenger-delete-modal');
        return $this->dispatch('alert', type:'success', message: 'Passenger has been successfully deleted.');
      }
    }
  }

}


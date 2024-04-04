<?php

namespace App\Livewire\Booking\Passenger;

use Livewire\Component;

use App\Models\Booking\Booking;
use App\Models\Booking\BookingPassenger;

class PassengerForm extends Component
{
	public $name;
	public $age;
	public $sex;
	public $nationality;
	public $address;
	public $pwd;
	public $bookingPassenger;

	public Booking $booking;

	public $listeners = [
    'getSelectedBookingPassenger'
  ];

  public function getSelectedBookingPassenger(BookingPassenger $selectedPassenger)
  {
		$this->bookingPassenger = $selectedPassenger;
		$this->name = $this->bookingPassenger->name;
		$this->age = $this->bookingPassenger->age;
		$this->sex = $this->bookingPassenger->sex;
		$this->nationality = $this->bookingPassenger->nationality;
		$this->address = $this->bookingPassenger->address;
		$this->pwd = $this->bookingPassenger->pwd;

  }
	public function render()
	{
		return view('livewire.booking.passenger.passenger-form');
	}
	protected function rules()
  {
		return [
			'name' 					=> 'required|string',
			'age' 					=> 'required|numeric',
			'sex' 					=> 'required|string',
			'nationality' 	=> 'required|string',
			'address' 			=> 'required|string',
			'pwd' 					=> 'required|boolean',
		];
  }

	public function store()
  {
    // validate data
    $data = $this->validate();

		// store Model
		$passenger = new BookingPassenger;
		$passenger->booking_id = $this->booking->id;
		$passenger->name = $data['name'];
		$passenger->age = $data['age'];
		$passenger->sex = $data['sex'];
		$passenger->nationality = $data['nationality'];
		$passenger->address = $data['address'];
		$passenger->pwd = $data['pwd'];
		$passenger->save();

    $this->clearForm();

    $this->dispatch('refresh-parent');
    $this->dispatch('alert', type:'success', message: 'Data has been saved successfully.', title: 'Booking Passenger');
    $this->dispatch('close-form-modal');

  }
	public function update()
	{
		 // validate data
		 $data = $this->validate();

		 // update Model
		 $this->bookingPassenger->name = $data['name'];
		 $this->bookingPassenger->age = $data['age'];
		 $this->bookingPassenger->sex = $data['sex'];
		 $this->bookingPassenger->nationality = $data['nationality'];
		 $this->bookingPassenger->address = $data['address'];
		 $this->bookingPassenger->pwd = $data['pwd'];
		 $this->bookingPassenger->save();

		 $this->clearForm();

		 $this->dispatch('refresh-parent');
		 $this->dispatch('alert', type:'success', message: 'Data has been saved successfully.', title: 'Booking Passenger');
		 $this->dispatch('close-form-modal');
	}

	public function close()
  {
    $this->clearForm();
    $this->dispatch('close-form-modal');
  }
	public function clearForm()
  {
    $this->resetErrorBag();
    $this->resetValidation();
    $this->reset(['bookingPassenger','name', 'age','sex','nationality','address','pwd']);
  }

}

<?php

namespace App\Livewire\Booking\Passenger;

use Livewire\Component;

use App\Models\Booking\Booking;
use App\Models\Booking\BookingPassenger;
use App\Models\Pumpboat\Pumpboat;

class ListPassenger extends Component
{
	public $bookingId;
	public Booking $booking;
	public Pumpboat $pumpboat;

	protected $listeners = [
    'refresh-parent' => '$refresh',
  ];
	public function mount($booking)
  {
    $booking->load('bookingPassengers');
  }
	public function render()
	{
		return view('livewire.booking.passenger.list-passenger');
	}

	public function add()
  {
    $this->dispatch('open-form-modal');
  }

	public function edit(BookingPassenger $bookingPassenger)
	{
		$this->dispatch('getSelectedBookingPassenger', $bookingPassenger->id);
    $this->dispatch('open-form-modal');
	}

	public function delete(BookingPassenger $bookingPassenger)
	{
		$this->bookingId = $bookingPassenger->id;
    $this->dispatch('open-delete-modal');
	}

	public function destroy()
	{
		$bookingPassenger = BookingPassenger::findOrFail($this->bookingId);

		$bookingPassenger->delete();

    $this->dispatch('refresh-parent');
    $this->dispatch('alert', type:'success', message: 'Data has been deleted successfully.');
    $this->dispatch('close-delete-modal');
	}
}


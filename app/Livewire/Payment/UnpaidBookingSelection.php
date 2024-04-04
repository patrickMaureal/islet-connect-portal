<?php

namespace App\Livewire\Payment;

use App\Models\Booking\Booking;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;

class UnpaidBookingSelection extends Component
{
	public $searchBooking;

	#[Locked]
	public $selectedBooking;

	public $amount;
	public $or_number;
	public $payment_date;
	public function render()
	{
		return view('livewire.payment.unpaid-booking-selection',[
		'bookings' => $this->filterBookings()]);
	}
	protected function rules()
  {
		return [
			'amount' 					=> 'required|numeric',
			'or_number' 				=> 'required|unique:payments,or_number',
			'payment_date' 			=> 'required|date',
		];
  }

	public function store()
	{
		$data = $this->validate();

		try{
			DB::beginTransaction();

			// add Payment
			$this->selectedBooking->payment()->create([
				'amount' => $data['amount'],
				'or_number' => $data['or_number'],
				'payment_date' => $data['payment_date'],
			]);

			// update Booking status
			$this->selectedBooking->status = 'Paid';
			$this->selectedBooking->save();

			DB::commit();
			$this->dispatch('alert', type:'success', message: 'Data has been saved successfully.', title: 'Payment');
			$this->dispatch('redirect', milliseconds:1000, url: route('payments.index'));

		}catch (\Throwable $th) {
			DB::rollBack();
			return $this->dispatch('alert', type:'error', message: 'Payment failed. Please review details and try again.');
		}
	}
	private function filterBookings()
	{
		return Booking::where('status', 'Unpaid')
		->where('code', 'LIKE', "%{$this->searchBooking}%")
		->select('id', 'code')
		->get();
	}

	public function selectBooking(Booking $booking)
  {
    $this->selectedBooking = $booking;
    return $this->dispatch('alert', type:'success', message: 'Booking selected.');
  }
}

<?php

namespace App\Livewire\Mobile\Booking\Wizard\Steps;

use Spatie\LivewireWizard\Components\StepComponent;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

use App\Models\Booking\Booking;
use App\Models\Islet\Islet;
use App\Models\Pumpboat\Pumpboat;
use App\Notifications\Booking\BookingNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class Summary extends StepComponent
{

  public $schedule;
  public $passengers;
  public $islets;
  public $pumpboat;
	public $name;
	public $email;
	public $phone;
	public $address;
  // public function stepInfo(): array
	// {
	// 	return [
	// 		'label' => 'Summary',
	// 		'icon' => 'fa-solid fa-5',
	// 	];
	// }
	public function render()
	{
    // returns all state of the given step
    $isletSelectionState = $this->state()->forStep('mobile-islet-selection-step');
    $pumpboatSelectionState = $this->state()->forStep('mobile-pumpboat-selection-step');
    $passengerProfileState = $this->state()->forStep('mobile-passenger-profile-step');
    $scheduleSelectionState = $this->state()->forStep('mobile-schedule-selection-step');

    /***
     * Islet
     */
    // array
    $selectedIsletsArray = $isletSelectionState['selectedIslets'];

    // this array of selected islet id's will be use to filter the Pumpboats
    $selectedIsletsId = collect($selectedIsletsArray)->map(function ($islet) {
      return $islet['id'];
    })->all();

    $this->islets = Islet::with('media')->findOrFail($selectedIsletsId);

    /**
     * Pumpboat
     */
    $this->pumpboat = Pumpboat::with(['pumpboatOwner', 'pumpboatCaptain', 'media'])->findOrFail($pumpboatSelectionState['selectedPumpboat']['id']);

    /***
     * Passenger
     */
    $passengersCollection = collect($passengerProfileState['passengers']);
		$this->passengers = $passengersCollection->map(function ($item) {
			return collect($item)->except(['id'])->toArray();
		});

    /**
     * Schedule
     */
    $this->schedule['from_date'] = Carbon::createFromFormat('Y-m-d', $scheduleSelectionState['from_date'])->format('M jS, Y');
    $this->schedule['to_date'] = Carbon::createFromFormat('Y-m-d', $scheduleSelectionState['to_date'])->format('M jS, Y');
    $this->schedule['total_days'] = $scheduleSelectionState['total_days'];

		return view('livewire.mobile.booking.wizard.steps.summary');
	}

	public function confirm()
	{

		try {
			DB::beginTransaction();

			// add Booking
			$booking 											= new Booking;
			$booking->scheduled_date_from = $this->schedule['from_date'];
			$booking->scheduled_date_to 	= $this->schedule['to_date'];
			$booking->pumpboat_id 				= $this->pumpboat->id;
			$booking->save();

			// add Islet
			$booking->islets()->sync($this->islets->pluck('id'));

			// add Passenger
			$booking->bookingPassengers()->createMany($this->passengers);

			// add Contact
			$booking->contact()->create([
				'name' => $this->name,
				'email' => $this->email,
				'phone' => $this->phone,
				'address' => $this->address,
			]);

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			$this->dispatch('close-booking-confirmation-modal');
			return $this->dispatch('alert', type:'error', message: 'Booking failed. Please review details and try again.');
		}

		$this->dispatch('close-booking-confirmation-modal');
    $this->dispatch('swal', type:'success', title: 'Booking Success', text: 'The e-ticket has been sent to your email.', url: route('mobile.booking'));

		// booking qrcode
		$bookingQrCode = base64_encode(QrCode::format('svg')->size(70)->generate( $booking->code ));

		// download receipt
		$pdfContent = Pdf::loadView('booking.download.receipt', [
			'bookingQrCode' => $bookingQrCode,
			'booking' 			=> $booking,
			'schedule' 			=> $this->schedule,
			'passengers' 		=> $this->passengers,
			'islets' 				=> $this->islets,
			'pumpboat' 			=> $this->pumpboat
		])->setPaper('A4', 'portrait')->output();

		// save pdf file to Storage
		$uploaded = Storage::put('public/bookings/'.$booking->code.'.pdf', $pdfContent);

		if ($uploaded) {
			$data = [
				'code' => $booking->code,
				'name' => $this->name,
			];
	
			// send email notification
			Notification::route('mail', $this->email)->notify(new BookingNotification($data));
		}

	}
}

<?php

namespace App\Services\Booking;

use App\Models\Booking\Booking;

class BookingCodeService
{
	public function generate()
	{
		$time = time();

		$latestBooking = Booking::latest()->first();

		if ($latestBooking) {
			$newBookingCodeCounter = $latestBooking->code_counter + 1;
			$newBookingCode = $time.$newBookingCodeCounter;
		} else {
			$newBookingCodeCounter = 1;
			$newBookingCode = $time.$newBookingCodeCounter;
		}

		return [
			'code' 					=> $newBookingCode,
			'code_counter' 	=> $newBookingCodeCounter,
		];

	}

}
<?php

namespace App\Http\Controllers\Web\Booking;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Models\Booking\Booking;

class PrintBooking extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Booking $booking)
	{
		$booking->load('bookingPassengers', 'islets', 'pumpboat.pumpboatOwner', 'pumpboat.pumpboatCaptain', 'payment');

		// booking qrcode
		$bookingQrCode = base64_encode(QrCode::format('svg')->size(70)->generate( $booking->code ));

		// schedule total days
		$numberOfDays = $booking->scheduled_date_from->diffInDays($booking->scheduled_date_to)+1;

		$pdf = Pdf::loadView('booking.admin.receipt', compact('booking', 'bookingQrCode', 'numberOfDays'))->setPaper('A4', 'portrait');
		return $pdf->stream('booking-receipt.pdf');

	}
}


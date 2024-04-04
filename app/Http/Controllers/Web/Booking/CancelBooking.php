<?php

namespace App\Http\Controllers\Web\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Booking\Booking;

class CancelBooking extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request,Booking $booking)
	{
		if ($request->ajax()) {

			$booking->status = 'Cancelled';
			$booking->save();

			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully updated.'
			], Response::HTTP_OK);

		}
	}
}

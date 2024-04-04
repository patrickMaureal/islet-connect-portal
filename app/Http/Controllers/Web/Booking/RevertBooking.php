<?php

namespace App\Http\Controllers\Web\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\Booking\Booking;


class RevertBooking extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request,Booking $booking)
	{
		if ($request->ajax()) {

			$booking->status = 'Pending';
			$booking->save();

			return response()->json([
				'success' => true,
				'message' => 'Booking has been reverted.'
			], Response::HTTP_OK);

		}
	}
}

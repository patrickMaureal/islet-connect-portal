<?php

namespace App\Http\Controllers\Web\Registration;

use App\Http\Controllers\Controller;
use App\Models\Registration\Registration;
use App\Notifications\Registration\RegistrationDenied;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DenyRegistration extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request,Registration $registration)
	{
		if ($request->ajax()) {

			$registration->status = 'Denied';
			$registration->save();

			//assign role

			//this will send email notification to denied registration
			$registration->notify(new RegistrationDenied());

			return response()->json([
				'success' => true,
				'message' => 'Registeration Denied.'
			], Response::HTTP_OK);
		}
	}
}

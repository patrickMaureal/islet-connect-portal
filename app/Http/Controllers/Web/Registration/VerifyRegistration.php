<?php

namespace App\Http\Controllers\Web\Registration;

use App\Http\Controllers\Controller;
use App\Notifications\Registration\UserVerified;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

use App\Models\Registration\Registration;
use App\Models\User\User;

class VerifyRegistration extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request, Registration $registration)
	{
		if ($request->ajax()) {

			$registration->status = 'Verified';
			$registration->verified_at = now();
			$registration->save();

			// Now, create users based on the updated registrations
			$user = User::create([
				'name' 						 			=> $registration->name,
				'email' 					 			=> $registration->email,
				'password' 				 			=> Hash::make('12345678'),
				'region' 							  => $registration->region,
				'province' 				 			=> $registration->province,
				'municipality' 		 			=> $registration->municipality,
			]);

			//assign role
			$user->assignRole($registration->role);

			//this will send email notification to created user email
			$user->notify(new UserVerified());

			return response()->json([
				'success' => true,
				'message' => 'User has been successfully created.'
			], Response::HTTP_OK);
		}
	}
}


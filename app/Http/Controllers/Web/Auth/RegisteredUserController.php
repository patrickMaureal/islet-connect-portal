<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\StoreRegistrationRequest;
use App\Services\Media\MediaAttachmentService;
use Illuminate\View\View;

use App\Models\Registration\Registration;

class RegisteredUserController extends Controller
{
	/**
	 * Display the registration view.
	 */
	public function create(): View
	{
		return view('auth.register');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(StoreRegistrationRequest $request, MediaAttachmentService $validationDocument)
	{
		$data = $request->validated();

		// Store Registration
		$registration = new Registration;
		$registration->name = $data['name'];
		$registration->email = $data['email'];
		$registration->birthdate = $data['birthdate'];
		$registration->role = $data['role'];
		$registration->region = $data['region'];
		$registration->province = $data['province'];
		$registration->municipality = $data['municipality'];
		$registration->save();

		// Upload validation document
		$validationDocument->uploadSingle($registration, $data['validation_document'], 'validation_documents');

		// Flash a success message to the session
		toast('Registered Successfully.', 'success');

		// Redirect back to the registration form
		return redirect()->route('register');
	}
}

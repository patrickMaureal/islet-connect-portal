<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
	/**
	 * Update the user's password.
	 */
	public function update(UpdatePasswordRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		$request->user()->update([
			'password' => Hash::make($validated['password']),
		]);

		toast('Your password has been updated.', 'success');
		return back();
	}
}

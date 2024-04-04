<?php

namespace App\Http\Controllers\Web\Profile;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User\User;

class ProfileController extends Controller
{
  /**
	 * Display the user's profile form.
	 */
	public function edit(Request $request): View
	{

		return view('profile.edit', [
			'user' => $request->user(),
		]);
	}

	/**
	 * Update the user's profile information.
	 */
	public function update(ProfileUpdateRequest $request): RedirectResponse
	{
		$request->user()->fill($request->validated());

		if ($request->user()->isDirty('email')) {
			$request->user()->email_verified_at = null;
		}

		$request->user()->save();

		toast('Data has been successfully updated.', 'success');
		return Redirect::route('profile.edit');
	}

	/**
	 * Delete the user's account.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		$request->validateWithBag('userDeletion', [
			'password' => ['required', 'current_password'],
		]);

		$user = $request->user();

		Auth::logout();

		$user->delete();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return Redirect::to('/');
	}
	/**
	 * Store profile picture
	 */
	public function storeImage(Request $request)
	{
		if ($request->ajax()) {

			$profile = User::findOrFail($request->id); //user record

			$image  = str_replace('data:image/jpeg;base64,', '', $request->image); //image snapshot

			$profile->addMediaFromBase64($image)->usingFileName($profile->id . '.jpeg')->toMediaCollection('profiles'); //add media

			return response()->json([
				'success' => true,
				'message' => 'Profile has been updated successfully.'
			], Response::HTTP_OK);
		}
	}
}

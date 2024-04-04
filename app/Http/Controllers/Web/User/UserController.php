<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Registration\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Role\Role;
use App\Models\User\User;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		return view('user.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$users = User::where('id', '!=', Auth::id())->select('id', 'name', 'email', 'created_at');

			return DataTables::of($users)
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->addColumn('action', 'user.table-buttons')
				->rawColumns(['action', 'created_at'])
				->toJson();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		// get all roles under 'web' guard
		$roles = Role::where('guard_name', 'web')->pluck('name')->toArray();

		return view('user.create', compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreUserRequest $request): RedirectResponse
	{
		// validated data
		$data = $request->validated();

		// store User
		$user 																		= new User;
		$user->name 															= $data['name'];
		$user->email 															= $data['email'];
		$user->password 													= Hash::make($data['password']);
		$user->region                  						= $data['region'];
		$user->province                  					= $data['province'];
		$user->municipality                  			= $data['municipality'];
		$user->save();

		// assign role
		$user->assignRole($data['role']);

		toast('User has been successfully added.', 'success');
		return redirect()->route('users.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		// return view('user.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(User $user)
	{
		// get the names of the user's roles
		$userRoles = $user->getRoleNames()->toArray();

		// get all roles under 'web' guard
		$roles = Role::where('guard_name', 'web')->pluck('name')->toArray();

		return view('user.edit', compact('user', 'roles', 'userRoles'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateUserRequest $request, User $user): RedirectResponse
	{
		// validated data
		$data = $request->validated();

		// update User
		$user->name 															= $data['name'];
		$user->email 															= $data['email'];
		$user->password 													= Hash::make($data['password']);
		$user->region                  						= $data['region'];
		$user->province                  					= $data['province'];
		$user->municipality                  			= $data['municipality'];
		$user->save();

		// assign role
		$user->syncRoles($data['role']);

		toast('User has been successfully updated.', 'success');
		return redirect()->route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, User $user)
	{
		if ($request->ajax()) {

			$registration = Registration::where('email', $user->email)->first();
			if ($registration) {
				$registration->update(['status' => 'Unverified']);
			}

			$user->delete();

			return response()->json([
				'success'  => true,
				'message'  => 'User has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}

	/**
	 * Store profile picture
	 */
	public function storeImage(Request $request)
	{
		if ($request->ajax()) {

			$user = User::findOrFail($request->id); //user record

			$image  = str_replace('data:image/jpeg;base64,', '', $request->image); //image snapshot

			$user->addMediaFromBase64($image)->usingFileName($user->id . '.jpeg')->toMediaCollection('profiles'); //add media

			return response()->json([
				'success' => true,
				'message' => 'Profile has been updated successfully.'
			], Response::HTTP_OK);
		}
	}
}


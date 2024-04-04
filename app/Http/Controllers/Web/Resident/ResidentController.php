<?php

namespace App\Http\Controllers\Web\Resident;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resident\StoreResidentRequest;
use App\Http\Requests\Resident\UpdateResidentRequest;
use App\Models\Resident\Resident;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ResidentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('resident.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {


			$residents = Resident::select('id', 'first_name', 'last_name', 'name_extension', 'gender', 'employment_status' , 'created_at');

			return DataTables::of($residents)
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->addColumn('action', 'resident.table-buttons')
				->rawColumns(['action', 'created_at'])
				->toJson();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('resident.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreResidentRequest $request): RedirectResponse
	{
		// validated data
		$data = $request->validated();

		// store resident
		$resident                                     = new Resident();
		$resident->first_name                         = $data['first_name'];
		$resident->middle_name                        = $data['middle_name'];
		$resident->last_name                          = $data['last_name'];
		$resident->name_extension                     = $data['name_extension'];
		$resident->prefix                             = $data['prefix'];
		$resident->gender                             = $data['gender'];
		$resident->email                              = $data['email'];
		$resident->contact_number                     = $data['contact_number'];
		$resident->bloodtype                          = $data['bloodtype'];
		$resident->physical_status                    = $data['physical_status'];
		$resident->birthplace                         = $data['birthplace'];
		$resident->birthdate                          = $data['birthdate'];
		$resident->marital_status                     = $data['marital_status'];
		$resident->employment_status                  = $data['employment_status'];
		$resident->evacuation_center                  = $data['evacuation_center'];
		$resident->region                  						= $data['region'];
		$resident->province                  					= $data['province'];
		$resident->municipality                  			= $data['municipality'];
		$resident->barangay                  					= $data['barangay'];
		$resident->street                  						= $data['street'] ?? null;
		$resident->save();

		toast('Resident has been added successfully.', 'success');
		return redirect()->route('residents.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Resident $resident)
	{
		return view('resident.edit', compact('resident'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateResidentRequest $request, Resident $resident): RedirectResponse
	{
		// validated data
		$data = $request->validated();

		// store resident
		$resident->first_name                         = $data['first_name'];
		$resident->middle_name                        = $data['middle_name'];
		$resident->last_name                          = $data['last_name'];
		$resident->name_extension                     = $data['name_extension'];
		$resident->prefix                             = $data['prefix'];
		$resident->gender                             = $data['gender'];
		$resident->email                              = $data['email'];
		$resident->contact_number                     = $data['contact_number'];
		$resident->bloodtype                          = $data['bloodtype'];
		$resident->physical_status                    = $data['physical_status'];
		$resident->birthplace                         = $data['birthplace'];
		$resident->birthdate                          = $data['birthdate'];
		$resident->marital_status                     = $data['marital_status'];
		$resident->employment_status                  = $data['employment_status'];
		$resident->evacuation_center                  = $data['evacuation_center'];
		$resident->region                  						= $data['region'];
		$resident->province                  					= $data['province'];
		$resident->municipality                  			= $data['municipality'];
		$resident->barangay                  					= $data['barangay'];
		$resident->street                  						= $data['street'] ?? null;
		$resident->update();

		toast('Resident has been successfully updated.', 'success');
		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, Resident $resident)
	{
		if ($request->ajax()) {

			// validate if resident exists in related models
			if ($resident->pumpboatsAsCaptain()->exists() || $resident->pumpboatsAsOwner()->exists()) {
				return response()->json([
					'success'  => false,
					'message'  => 'Data is currently in used.'
				], Response::HTTP_UNPROCESSABLE_ENTITY);
			}

			// delete resident
			$resident->delete();

			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}

	/**
	 * Store profile picture
	 */
	public function storeImage(Request $request)
	{
		if ($request->ajax()) {

			$resident = Resident::findOrFail($request->id); //user record

			$image  = str_replace('data:image/jpeg;base64,', '', $request->image ); //image snapshot

			$resident->addMediaFromBase64($image)->usingFileName($resident->id . '.jpeg')->toMediaCollection('profiles'); //add media

			return response()->json([
				'success' => true,
				'message' => 'Profile has been updated successfully.'
			], Response::HTTP_OK);

		}
	}

}


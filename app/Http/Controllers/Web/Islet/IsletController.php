<?php

namespace App\Http\Controllers\Web\Islet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Islet\StoreIsletRequest;
use App\Http\Requests\Islet\UpdateIsletRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Services\Media\MediaAttachmentService;

use App\Models\Islet\Islet;
use App\Models\Media\Media;

class IsletController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		return view('islet.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			// main query
			$query = Islet::query();

			if ( auth()->user()->hasRole('Administrator') ) {
				// Administrator Role
				$islets = $query->select('id', 'name', 'total_population', 'created_at');
			} else {
				// LGU Role
				$islets = $query->where('region', auth()->user()->region)
												->where('province', auth()->user()->province)
												->where('municipality', auth()->user()->municipality)
												->select('id', 'name', 'total_population', 'created_at');
			}

			return DataTables::of($islets)
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->addColumn('action', 'islet.table-buttons')
				->rawColumns(['action', 'created_at'])
				->toJson();
		}
	}


	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('islet.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreIsletRequest $request, MediaAttachmentService $isletAttachment): RedirectResponse
	{
		// validated data
		$data = $request->validated();

		// store Islet
		$islet                    = new Islet;
		$islet->name             	= $data['name'];
		$islet->total_population 	= $data['total_population'];
		$islet->description     	= $data['description'];
		$islet->region            = $data['region'];
		$islet->province         	= $data['province'];
		$islet->municipality      = $data['municipality'];
		$islet->barangay          = $data['barangay'];
		$islet->latitude     			= $data['latitude'];
		$islet->longitude     		= $data['longitude'];
		$islet->save();

		$isletAttachment->uploadMultiple($islet, $data['file'], 'profiles');
		$isletAttachment->uploadSingle($islet, $data['cover_photo'], 'cover_photos');

		toast('Data has been successfully added.', 'success');
		return redirect()->route('islets.index');
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
	public function edit(Islet $islet)
	{
		$islet->load('media');
		return view('islet.edit', compact('islet'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateIsletRequest $request, Islet $islet, MediaAttachmentService $isletAttachment): RedirectResponse
	{
		// validated data
		$data = $request->validated();

		// update Islet
		$islet->name             = $data['name'];
		$islet->total_population = $data['total_population'];
		$islet->description      = $data['description'];
		$islet->region           = $data['region'];
		$islet->province         = $data['province'];
		$islet->municipality     = $data['municipality'];
		$islet->barangay         = $data['barangay'];
		$islet->latitude     		 = $data['latitude'];
		$islet->longitude     	 = $data['longitude'];
		$islet->update();

		if (isset($data['file'])) {
			$isletAttachment->uploadMultiple($islet, $data['file'], 'profiles');
		}

		if (isset($data['cover_photo'])) {
			$isletAttachment->uploadSingle($islet, $data['cover_photo'], 'cover_photos');
		}

		toast('Data has been successfully updated.', 'success');
		return back();

	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, Islet $islet)
	{
		if ($request->ajax()) {

			$islet->delete();

			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroyAttachment(Request $request, $media)
	{
		if ($request->ajax()) {

			Media::where('uuid', $media)->delete();
			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}
}


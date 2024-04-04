<?php

namespace App\Http\Controllers\Web\Pumpboat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pumpboat\StorePumpboatRequest;
use App\Http\Requests\Pumpboat\UpdatePumpboatRequest;
use App\Services\Media\MediaAttachmentService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Islet\Islet;
use App\Models\Media\Media;
use App\Models\Pumpboat\Pumpboat;
use App\Models\Resident\Resident;

class PumpboatController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('pumpboat.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$pumpboats = Pumpboat::join('residents as owner', 'owner.id', '=', 'pumpboats.owner')
														->join('residents as captain', 'captain.id', '=', 'pumpboats.captain')
														->select('pumpboats.id', 'pumpboats.name', 'owner.first_name as o_fname', 'owner.last_name as o_lname', 'captain.first_name as c_fname', 'captain.last_name as c_lname', 'pumpboats.created_at');

			return DataTables::of($pumpboats)
				->addColumn('o_name', function($row) {
					return $row->o_fname . ' ' . $row->o_lname;
				})
				->addColumn('c_name', function($row) {
					return $row->c_fname . ' ' . $row->c_lname;
				})
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->filterColumn('o_name', function ($query, $keyword) {

					$pumpboats = Pumpboat::whereHas('pumpboatOwner', function($subQuery) use($keyword) {
						$subQuery->where('first_name', 'like', '%'.$keyword.'%')->orWhere('last_name', 'like', '%'.$keyword.'%');
					})->get()->pluck('id')->toArray();

					$query->whereIn('pumpboats.id', $pumpboats);
				})
				->filterColumn('c_name', function ($query, $keyword) {

					$pumpboats = Pumpboat::whereHas('pumpboatCaptain', function($subQuery) use($keyword) {
						$subQuery->where('first_name', 'like', '%'.$keyword.'%')->orWhere('last_name', 'like', '%'.$keyword.'%');
					})->get()->pluck('id')->toArray();

					$query->whereIn('pumpboats.id', $pumpboats);
				})
				->addColumn('action', 'pumpboat.table-buttons')
				->rawColumns(['action', 'created_at'])
				->toJson();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{

		// fetch all residents
		$residents 	= Resident::all();

		return view('pumpboat.create', compact('residents'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StorePumpboatRequest $request, MediaAttachmentService $pumpboatAttachment)
	{
		// validated data
		$data = $request->validated();

		// store Pumpboat
		$pumpboat 														= new Pumpboat;
		$pumpboat->name 											= $data['name'];
		$pumpboat->reg_number 								= $data['reg_number'];
		$pumpboat->total_passenger_capacity 	= $data['total_passenger_capacity'];
		$pumpboat->description 								= $data['description'];
		$pumpboat->dimension_width 						= $data['dimension_width'];
		$pumpboat->dimension_length 					= $data['dimension_length'];
		$pumpboat->dimension_depth 						= $data['dimension_depth'];
		$pumpboat->fuel_type 									= $data['fuel_type'];
		$pumpboat->hull_material 							= implode(',' , $data['hull_material']);
		$pumpboat->safety_equipment 					= implode(',' , $data['safety_equipment']);
		$pumpboat->owner 											= $data['owner'];
		$pumpboat->captain 										= $data['captain'];
		$pumpboat->amenities 									= implode(',' , $data['amenities']);
		$pumpboat->save();

		$pumpboatAttachment->uploadMultiple($pumpboat, $data['file'], 'profiles');
		$pumpboatAttachment->uploadSingle($pumpboat, $data['cover_photo'], 'cover_photos');

		toast('Pumpboat has been successfully added.', 'success');
		return redirect()->route('pumpboats.index');
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
	public function edit(Pumpboat $pumpboat)
	{

		// fetch all residents
		$residents 	= Resident::all();
		$islets 		= Islet::all();

		// selected items
		$hullMaterials = explode(',' , $pumpboat->hull_material);
		$safetyEquipment = explode(',' , $pumpboat->safety_equipment);
		$pumpboatAmenities = explode(',' , $pumpboat->amenities);

		$pumpboat->load('media', 'routes');

		// pumpboat selected routes
		$selectedRoutes = $pumpboat->routes->pluck('id')->toArray();

		return view('pumpboat.edit', compact('pumpboat', 'residents', 'hullMaterials', 'safetyEquipment', 'pumpboatAmenities', 'islets', 'selectedRoutes'));

	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdatePumpboatRequest $request, Pumpboat $pumpboat, MediaAttachmentService $pumpboatAttachment)
	{
		// validated data
		$data = $request->validated();

		// update Pumpboat
		$pumpboat->name 											= $data['name'];
		$pumpboat->reg_number 								= $data['reg_number'];
		$pumpboat->total_passenger_capacity 	= $data['total_passenger_capacity'];
		$pumpboat->description 								= $data['description'];
		$pumpboat->dimension_width 						= $data['dimension_width'];
		$pumpboat->dimension_length 					= $data['dimension_length'];
		$pumpboat->dimension_depth 						= $data['dimension_depth'];
		$pumpboat->fuel_type 									= $data['fuel_type'];
		$pumpboat->hull_material 							= implode(',' , $data['hull_material']);
		$pumpboat->safety_equipment 					= implode(',' , $data['safety_equipment']);
		$pumpboat->owner 											= $data['owner'];
		$pumpboat->captain 										= $data['captain'];
		$pumpboat->amenities 									= implode(',' , $data['amenities']);
		$pumpboat->update();

		if (isset($data['file'])) {
			$pumpboatAttachment->uploadMultiple($pumpboat, $data['file'], 'profiles');
		}

		if (isset($data['cover_photo'])) {
			$pumpboatAttachment->uploadSingle($pumpboat, $data['cover_photo'], 'cover_photos');
		}
		toast('Pumpboat has been successfully updated.', 'success');
		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, Pumpboat $pumpboat)
	{
		if ($request->ajax()) {

			$pumpboat->delete();

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


<?php

namespace App\Http\Controllers\Web\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Registration\Registration;

class RegistrationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('registration.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$registered = Registration::select('id', 'name', 'email', 'role', 'status', 'created_at');

			return DataTables::of($registered)
				->editColumn('status', function ($row) {
					$bgColor = ($row->status == 'Verified') ? 'bg-success' : (($row->status == 'Unverified') ? 'bg-info' : 'bg-warning');
					return '<span class="badge badge-md ' . $bgColor . ' ">' . $row->status . '</span>';
				})
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->addColumn('action', function ($row) {
					return view('registration.table-buttons', compact('row'));
				})
				->rawColumns(['action','status', 'created_at'])
				->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(string $id)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Registration $registration)
	{
		$registration->load('media');
		return view('registration.show', compact('registration'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}

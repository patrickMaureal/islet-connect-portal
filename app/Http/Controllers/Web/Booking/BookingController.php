<?php

namespace App\Http\Controllers\Web\Booking;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Response;


use App\Models\Booking\Booking;
use App\Models\Booking\BookingIslet;
use App\Models\Booking\BookingPassenger;
use App\Models\Islet\Islet;
use App\Models\Pumpboat\Pumpboat;

class BookingController extends Controller
{
	/**
		* Display a listing of the resource.
		*/
	public function index()
	{
		return view('booking.admin.index');
	}
	public function showTable(Request $request)
	{
		if ($request->ajax()) {


			$bookings = Booking::select('id', 'code', 'status', 'created_at');

			return DataTables::of($bookings)
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->addColumn('action', function ($row) {
					return view('booking.admin.table-buttons', compact('row'));
				})
				->rawColumns(['action', 'created_at'])
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
	public function store(Request $request)
	{
			//
	}

	/**
		* Display the specified resource.
		*/
	public function show(Booking $booking)
	{
		$scheduleDateFrom = Carbon::parse($booking->scheduled_date_from);
		$scheduleDateTo = Carbon::parse($booking->scheduled_date_to);

		$numberOfDays = $scheduleDateFrom->diffInDays($scheduleDateTo)+1;

		$passengers = BookingPassenger::where('booking_id', $booking->id)->get();
		$passengerCount = $passengers->count();

		$pumpboat = Pumpboat::all()
    ->where('id', $booking->pumpboat_id)
    ->first();

		$selectedBookingIsletIds = BookingIslet::where('booking_id', $booking->id)->pluck('islet_id')->toArray();
		$islets = Islet::whereIn('id', $selectedBookingIsletIds)->get();

		return view("booking.admin.show", compact('booking','scheduleDateFrom', 'scheduleDateTo', 'numberOfDays', 'passengers', 'passengerCount', 'pumpboat', 'islets'));
	}

	/**
		* Show the form for editing the specified resource.
		*/
	public function edit(Booking $booking)
	{
		$scheduleDateFrom = Carbon::parse($booking->scheduled_date_from);
		$scheduleDateTo = Carbon::parse($booking->scheduled_date_to);

		$numberOfDays = $scheduleDateFrom->diffInDays($scheduleDateTo)+1;

		$passengers = BookingPassenger::where('booking_id', $booking->id)->get();
		$passengerCount = $passengers->count();

		$pumpboat = Pumpboat::all()
    ->where('id', $booking->pumpboat_id)
    ->first();

		$selectedBookingIsletIds = BookingIslet::where('booking_id', $booking->id)->pluck('islet_id')->toArray();
		$islets = Islet::whereIn('id', $selectedBookingIsletIds)->get();

		return view("booking.admin.edit", compact('booking','scheduleDateFrom', 'scheduleDateTo', 'numberOfDays', 'passengers', 'passengerCount', 'pumpboat', 'islets'));

	}

	/**
		* Update the specified resource in storage.
		*/
	public function update(Booking $booking)
	{
		$booking->status = 'confirmed';
		$booking->save();

		return redirect()->route('booking.index');
	}

	/**
		* Remove the specified resource from storage.
		*/
		public function destroy(Request $request, Booking $booking)
		{
			if ($request->ajax()) {

				$booking->delete();

				return response()->json([
					'success'  => true,
					'message'  => 'Booking has been successfully deleted.'
				], Response::HTTP_OK);
			}
		}
}


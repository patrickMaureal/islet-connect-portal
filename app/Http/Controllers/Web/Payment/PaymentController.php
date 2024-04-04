<?php

namespace App\Http\Controllers\Web\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;


use App\Models\Payment\Payment;
use App\Models\Booking\Booking;
use Illuminate\Support\Number;

class PaymentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		return view('payment.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$payments = Payment::join('bookings', 'payments.booking_id', '=', 'bookings.id')
				->select('payments.id', 'payments.code as payment_code', 'bookings.code as code','or_number', 'amount', 'payment_date');

			return DataTables::of($payments)
				->editColumn('payment_date', function ($row) {
					return $row->payment_date->format('F jS \of Y'); // human readable format
				})
				->editColumn('amount', function ($row) {
					return $row->amount = Number::currency($row->amount, 'PHP', 2);
				})
				->addColumn('action', 'payment.table-buttons')
				->rawColumns(['action', 'payment_date'])
				->toJson();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): View
	{
		$bookings = Booking::where('status', 'Unpaid')->select('id', 'code')->get();
		return view('payment.create', compact('bookings'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{

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
	public function destroy(Request $request, Payment $payment)
	{
		if ($request->ajax()) {

			// revert Booking status
			Booking::where('id', $payment->booking_id)->update([
				'status' => 'Unpaid'
			]);

			// delete Payment
			$payment->delete();

			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}
}


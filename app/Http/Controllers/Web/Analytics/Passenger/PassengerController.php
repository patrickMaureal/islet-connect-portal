<?php

namespace App\Http\Controllers\Web\Analytics\Passenger;

use App\Http\Controllers\Controller;
use App\Models\Booking\BookingPassenger;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
  public function index(Request $request) {
		$years = BookingPassenger::selectRaw('YEAR(created_at) as year')->distinct()->orderBy('year', 'desc')->pluck('year');
		return view('analytics.passenger.index',compact('years'));
	}

	public function showChart(Request $request)
	{
		$selectedYear = $request->input('selectedYear');
		$passengers = BookingPassenger::with('booking')->whereHas('booking', function($query) use($selectedYear) {
			return $query->whereYear('scheduled_date_from', $selectedYear)
									 ->where('status','!=', 'Cancelled');
		})->get();

		$groupByMonths = $passengers->groupBy(function ($passenger) {
			return Carbon::parse($passenger->booking->scheduled_date_from)->format('F');
		});

		$labels = $groupByMonths->keys()->all();
		$totalPassengers = $groupByMonths->map(function ($passengers) {
			return $passengers->count();
		});

		//return to json format for chart
		return response()->json([
			'selectedYear' => $selectedYear,
			'labels' => $labels,
			'datasets' => [
				[
					'label' => 'Total Passengers in ' . $selectedYear,
					'backgroundColor' => 'rgba(249, 157, 54,0.4)',
					'borderColor' => 'rgb(249, 157, 54)',
					'data' => $totalPassengers,
					'tension' => 0.2,
					'fill' => true,

				],
			],
		]);
	}

	public function printChart(Request $request)
	{
		$chartImage = $request->chart_image;
		$pdf = Pdf::loadView('analytics.passenger.report', compact('chartImage'))->setPaper('A4', 'portrait');
		return $pdf->stream('passenger-report.pdf');
	}
}

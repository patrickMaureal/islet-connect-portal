<?php

namespace App\Http\Controllers\Web\Analytics\Demographic;

use App\Http\Controllers\Controller;
use App\Models\Booking\BookingPassenger;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DemographicController extends Controller
{
	public function index(Request	$request)
	{
		$years = BookingPassenger::selectRaw('YEAR(created_at) as year')->distinct()->orderBy('year', 'desc')->pluck('year');

		return view('analytics.demographic.index',compact('years'));
	}

	public function showChart(Request $request)
	{
		$selectedYear = $request->input('selectedYear');

		//get passengers with corresponding year
		$passengers = BookingPassenger::with('booking')->whereHas('booking', function($query) use($selectedYear) {
			return $query->whereYear('scheduled_date_from', $selectedYear)
									 ->where('status','!=', 'Cancelled');
		})->get();

		//get months with corresponding data each month
		$groupByMonths = $passengers->groupBy(function ($passenger) {
			return Carbon::parse($passenger->booking->scheduled_date_from)->format('F');
		});
		// sort  months by corresponding month key
		$sortByMonths = $groupByMonths->sortBy(function ($value, $key) {
			return Carbon::parse($key)->month;
		});

		$labels = $sortByMonths->keys()->all();

		$malePassengers = $groupByMonths->map(function ($passengers) {
			return $passengers->where('sex', 'Male')->count();
		});

		$femalePassengers = $groupByMonths->map(function ($passengers) {
				return $passengers->where('sex', 'Female')->count();
		});

		return response()->json([
			'selectedYear' => $selectedYear,
			'labels' => $labels,
			'datasets' => [
				[
					'label' => 'Male Passengers in ' . $selectedYear,
					'backgroundColor' => [
						'rgba(75, 192, 192, 0.2)',
					],
					'borderColor' => [
						'rgb(75, 192, 192)',
					],
					'borderWidth'=> 1,
					'data' => $malePassengers,
				],
				[
					'label' => 'Female Passengers in ' . $selectedYear,
					'backgroundColor'=> [
						'rgba(255, 99, 132, 0.2)',
					],
					'borderColor'=> [
						'rgb(255, 99, 132)',
					],
					'borderWidth'=> 1,
					'data' => $femalePassengers,
				],
			],
		]);

	}

	public function printChart(Request $request)
	{
		$chartImage = $request->chart_image;
		$pdf = Pdf::loadView('analytics.demographic.report', compact('chartImage'))->setPaper('A4', 'portrait');
		return $pdf->stream('demographic-report.pdf');
	}
}

<?php

namespace App\Http\Controllers\Web\Analytics\Nationality;

use App\Http\Controllers\Controller;
use App\Models\Booking\BookingPassenger;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
  public function index()
	{
		$years = BookingPassenger::selectRaw('YEAR(created_at) as year')->distinct()->orderBy('year', 'desc')->pluck('year');
		return view('analytics.nationality.index',compact('years'));
	}

	public function showChart(Request $request)
	{
		$selectedYear = $request->input('selectedYear');

		//get passengers with corresponding year
		$passengers = BookingPassenger::with('booking')->whereHas('booking', function($query) use($selectedYear) {
			return $query->whereYear('scheduled_date_from', $selectedYear)
									 ->where('status','!=', 'Cancelled');
		})->get();

		$nationalities = $passengers->groupBy('nationality')->map->count();

		$backgroundColors = [];
		foreach ($nationalities as $key => $value) {
			$backgroundColors[] = 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')';
		}

		return response()->json([
			'selectedYear' => $selectedYear,
			'labels' => $nationalities->keys()->all(),
			'datasets' => [
				[
					'label' => 'Nationality in ' . $selectedYear,
					'backgroundColor' => $backgroundColors,
					'hoverOffset'=> 2,
					'data' => $nationalities->values()->all(),
				],
			],
		]);

	}

	public function printChart(Request $request)
	{
		$chartImage = $request->chart_image;
		$pdf = Pdf::loadView('analytics.nationality.report', compact('chartImage'))->setPaper('A4', 'portrait');
		return $pdf->stream('nationality-report.pdf');
	}
}

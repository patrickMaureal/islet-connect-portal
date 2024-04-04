<?php

namespace App\Http\Controllers\Web\Analytics\Revenue;

use App\Http\Controllers\Controller;
use App\Models\Payment\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
  public function index()
	{
		//get all years
		$years = Payment::selectRaw('YEAR(payment_date) as year')->distinct()->orderBy('year', 'desc')->pluck('year');

		return view('analytics.revenue.index',compact('years'));
	}

	public function showChart(Request $request)
	{
		if ($request->ajax()) {
			//get selected year
			$selectedYear = $request->input('selectedYear');

			//query months of selected year
			$payments = Payment::whereYear('payment_date', $selectedYear)->get();

			//group by month and format to human readable(ex. January,February)
			$groupByMonths = $payments->groupBy(function ($payment) {
				return Carbon::parse($payment->payment_date)->format('F');
			});

			//get keys and values
			$labels = $groupByMonths->keys()->all();
			$incomeData = $groupByMonths->map->sum('amount')->values()->all();

			//return to json format for chart
			return response()->json([
				'selectedYear' => $selectedYear,
				'labels' => $labels,
				'datasets' => [
					[
						'label' => 'Generated Income',
						'backgroundColor' => 'rgb(240, 140, 61)',
						'borderColor' => 'rgb(240, 140, 61)',
						'data' => $incomeData,
						'pointStyle' => 'circle',
						'pointRadius' => 10,
						'pointHoverRadius' => 15,
					],
				],
    	]);
		}
	}

	public function printChart(Request $request)
	{
		$chartImage = $request->chart_image;
		$pdf = Pdf::loadView('analytics.revenue.report', compact('chartImage'))->setPaper('A4', 'portrait');
		return $pdf->stream('revenue-report.pdf');
	}
}

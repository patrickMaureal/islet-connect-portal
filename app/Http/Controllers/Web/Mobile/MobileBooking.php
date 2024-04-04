<?php

namespace App\Http\Controllers\Web\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Islet\Islet;
use App\Models\Pumpboat\Pumpboat;
use Illuminate\Http\Request;

class MobileBooking extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request)
	{
    $islets = Islet::all();
    $pumpboats = Pumpboat::all();

		return view('mobile.booking.index', compact('islets', 'pumpboats'));
	}
}

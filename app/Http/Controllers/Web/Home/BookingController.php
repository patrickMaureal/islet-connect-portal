<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use App\Models\Islet\Islet;
use App\Models\Pumpboat\Pumpboat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
  public function index(Islet $islet,Pumpboat $pumpboat)
	{
    $islets = Islet::all();
    $pumpboats = Pumpboat::all();

		return view('booking.homepage.index', compact('islets', 'pumpboats'));
	}
}

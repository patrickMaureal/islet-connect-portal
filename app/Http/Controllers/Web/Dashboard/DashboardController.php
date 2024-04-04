<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Islet\Islet;
use App\Models\Payment\Payment;
use App\Models\Registration\Registration;
use App\Models\Booking\Booking;
use App\Models\Pumpboat\Pumpboat;
use App\Models\Resident\Resident;
use App\Models\User\User;

class DashboardController extends Controller
{
  public function index(Request $request){

		$totalUsers = User::count();
		$totalRegistrations = Registration::count();
		$totalResidents = Resident::count();
		$totalBookings = Booking::count();
		$totalPayments = Payment::count();
		$totalIslets = Islet::count();
		$totalPumpboats = Pumpboat::count();


		return view('dashboard', compact('totalIslets', 'totalUsers','totalRegistrations', 'totalBookings', 'totalPayments', 'totalPumpboats', 'totalResidents'));
	}
}

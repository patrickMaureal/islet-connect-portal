<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use App\Models\Islet\Islet;
use App\Services\Address\AddressService;
use Illuminate\View\View;

class SearchIsletController extends Controller
{
	public function index(): View
	{
		return view('search-islet.index');
	}

	public function show(Islet $islet, AddressService $addressService): View
	{
		$islets = Islet::all();
		$islet->load('activities.media');

		$jsonAddress = $addressService->address($islet->barangay, $islet->municipality, $islet->province, $islet->region);
		$address = $jsonAddress->getData();

		return view('search-islet.islet-profile', compact('islet', 'address', 'islets'));
	}
}

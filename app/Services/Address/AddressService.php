<?php

namespace App\Services\Address;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AddressService {

	protected $url;

	public function __construct()
	{
		$this->url = config('app.psgc_api');
	}

	public function address(string $barangayCode,string $cityMuniCode,string $provinceCode,string $regionCode )
	{
		$region = $this->getRegion($regionCode);
		$province = $this->getProvince($provinceCode);
		$municipality = $this->getCityMuni($cityMuniCode);
		$barangay = $this->getBarangay($barangayCode);

		$fullAddress = $barangay['name'] . ', ' . $municipality['name'] . ', ' . $province['name'] . ', ' . $region['name'];

		return response()->json([
			'full_address' 	=> $fullAddress,
			'region' 				=> $region['name'],
			'province' 			=> $province['name'],
			'municipality' 	=> $municipality['name'],
			'barangay' 			=> $barangay['name'],
		]);

	}

	private function getRegion(string $regionCode)
	{
		$response = Http::acceptJson()->get($this->url.'/regions/'. $regionCode);

		if ( $response->failed() ) {
			return abort(Response::HTTP_UNPROCESSABLE_ENTITY, 'Invalid Request.');
		}

		return $response->json();

	}

	private function getProvince(string $provinceCode)
	{
		$response = Http::acceptJson()->get($this->url.'/provinces/'. $provinceCode);

		if ( $response->failed() ) {
			return abort(Response::HTTP_UNPROCESSABLE_ENTITY, 'Invalid Request.');
		}

		return $response->json();
	}

	private function getCityMuni(string $cityMuniCode)
	{
		$municipalityResponse = Http::acceptJson()->get($this->url.'/municipalities/'. $cityMuniCode);

		if ( $municipalityResponse->failed() ) {

			// check cities api
			$response = Http::acceptJson()->get($this->url.'/cities/'. $cityMuniCode);

			if ( $response->failed() ) {
				return abort(Response::HTTP_UNPROCESSABLE_ENTITY, 'Invalid Request.');
			}

			return $response->json();

		}

		return $municipalityResponse->json();

	}

	private function getBarangay(string $barangayCode)
	{
		$response = Http::acceptJson()->get($this->url.'/barangays/'. $barangayCode);

		if ( $response->failed() ) {
			return abort(Response::HTTP_UNPROCESSABLE_ENTITY, 'Invalid Request.');
		}

		return $response->json();
	}
}

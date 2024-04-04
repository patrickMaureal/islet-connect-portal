<?php

namespace App\Http\Controllers\Web\Pumpboat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pumpboat\StorePumpboatRouteRequest;

use App\Models\Pumpboat\Pumpboat;

class PumpboatRoute extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(StorePumpboatRouteRequest $request, Pumpboat $pumpboat)
	{
		// validated data
		$data = $request->validated();

		$pumpboat->routes()->sync($data['routes']);

		toast('Pumpboat Routes has been successfully updated.', 'success');
		return back();

	}
}

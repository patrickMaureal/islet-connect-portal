<?php

namespace App\Models\Pumpboat;

use Illuminate\Database\Eloquent\Relations\Pivot;

class IsletPumpboat extends Pivot
{
	/**
	 * Indicates if the IDs are auto-incrementing.
	 *
	 * @var bool
	 */
	public $incrementing = true;
}

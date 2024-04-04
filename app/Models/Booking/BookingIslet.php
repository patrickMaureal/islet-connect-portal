<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookingIslet extends Pivot
{
	/**
	 * Indicates if the IDs are auto-incrementing.
	 *
	 * @var bool
	 */
	public $incrementing = true;
}

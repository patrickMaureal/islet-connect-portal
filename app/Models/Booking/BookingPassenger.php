<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingPassenger extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = [
		'booking_id',
		'name',
		'age',
		'sex',
		'nationality',
		'address',
		'pwd',
	];

	public function booking(): BelongsTo
	{
		return $this->belongsTo(Booking::class);
	}
}

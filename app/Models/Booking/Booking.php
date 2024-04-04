<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Services\Booking\BookingCodeService;

use App\Models\Payment\Payment;
use App\Models\Islet\Islet;
use App\Models\Pumpboat\Pumpboat;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = [
		'code',
		'code_counter',
		'scheduled_date_from',
		'scheduled_date_to',
		'pumpboat_id',
	];
	protected static function booted(): void
	{
		static::creating( function(Model $model) {

			$bookingCodeService = new BookingCodeService;

			// generate Booking Code
			$data = $bookingCodeService->generate();

			$model->code					= $data['code'];
			$model->code_counter	= $data['code_counter'];
		});
	}

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'scheduled_date_from' => 'datetime',
		'scheduled_date_to' 	=> 'datetime',
	];

	public function bookingPassengers(): HasMany
	{
		return $this->hasMany(BookingPassenger::class);
	}

	public function islets(): BelongsToMany
	{
		return $this->belongsToMany(Islet::class)->using(BookingIslet::class);
	}

	public function payment(): HasOne
	{
		return $this->hasOne(Payment::class);
	}

	public function pumpboat(): BelongsTo
	{
		return $this->belongsTo(Pumpboat::class);
	}

	public function contact(): HasOne
	{
		return $this->hasOne(ContactInformation::class);
	}

}

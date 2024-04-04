<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Payment\PaymentCodeService;

use App\Models\Booking\Booking;

class Payment extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = [
		'code',
		'code_counter',
		'booking_id',
		'or_number',
		'amount',
		'payment_date',
	];
	protected static function booted(): void
	{
		static::creating( function(Model $model) {

			$paymentCodeService = new PaymentCodeService;

			// generate Payment Code
			$data = $paymentCodeService->generate();

			$model->code					= $data['code'];
			$model->code_counter	= $data['code_counter'];
		});
	}

	protected $casts = [
		'payment_date' => 'datetime',
	];
	
	public function booking(): BelongsTo
	{
		return $this->belongsTo(Booking::class);
	}

}

<?php

namespace App\Services\Payment;

use App\Models\Payment\Payment;

class PaymentCodeService
{
	public function generate()
	{
		$time = time();

		$latestPayment = Payment::latest()->first();

		if ($latestPayment) {
			$newPaymentCodeCounter = $latestPayment->code_counter + 1;
			$newPaymentCode = $time.$newPaymentCodeCounter;
		} else {
			$newPaymentCodeCounter = 1;
			$newPaymentCode = $time.$newPaymentCodeCounter;
		}

		return [
			'code' 					=> $newPaymentCode,
			'code_counter' 	=> $newPaymentCodeCounter,
		];

	}

}
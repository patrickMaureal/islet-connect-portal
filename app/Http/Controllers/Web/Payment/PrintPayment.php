<?php

namespace App\Http\Controllers\Web\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Number;

use App\Models\Payment\Payment;

class PrintPayment extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Payment $payment)
	{
		$payment->load('booking');

		$paymentQrCode = base64_encode(QrCode::format('svg')->size(70)->generate($payment->code));

		$paymentAmount = Number::currency($payment->amount, in : 'PHP');

		// download receipt
		$pdf = Pdf::loadView('payment.receipt', compact('payment', 'paymentQrCode','paymentAmount'))->setPaper('A4', 'portrait');
		return $pdf->stream('payment-receipt.pdf');

	}
}

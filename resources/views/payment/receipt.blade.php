<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Payment Receipt</title>
		<style>
			* {
				font-family: "DejaVu Sans", Arial, Helvetica, sans-serif;
				font-size: 0.7rem;
			}

			/** Define the margins of your page **/
			@page {
				margin: 150px 0.5in 0.5in 0.5in;
			}

			.main {
				padding-top: 0px;
				margin-top: -50px;
			}

			.header {
				position: fixed;
				top: -120px;
				left: 0px;
				right: 0px;
				height: -120px;
			}

			.page-break {
				page-break-after: always;
			}

			#header-table {
				border-collapse: collapse;
				width: 100%;
			}

			#qrcode-table {
				border-collapse: collapse;
				width: 100%;
			}

			#qrcode-table td {
				padding: 3px;
			}

			.status{
				font-size: 1rem;
				text-transform: uppercase;
				color:  #50C878;
			}

			.text-center {
				text-align:center;
			}

		</style>

	</head>

	<body>
		<main>

			{{--
				- I use this, instead of <header></header>
				- better approach to exclude header on page 2
			--}}
			<div class="header">
				<table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
					<tr>
						<td>
							<strong style="font-size:1.3rem;">ISLET CONNECT</strong>
						</td>
						<td rowspan="4" style="width: 8%;">
							<img src="{{ asset('img/homepage/header/islet-connect-logo.png') }}" alt="" height="50px">
						</td>
					</tr>
					<tr>
						<td>
							Cebu City
						</td>
					</tr>
					<tr>
						<td>
							Telephone no: 0917-879-4554
						</td>
					</tr>
					<tr>
						<td>
							Email: <a href="mailto:info@isletconnect.com">info@isletconnect.com</a> Website: <a href="www.isletconnect.com">www.isletconnect.com</a>
						</td>
					</tr>
				</table>
			</div>

			<div class="main">
				<h1 style="text-align: center;font-size: 1.2rem;padding-top:50px;">Payment Receipt</h1>
				<table border="1" style="width: 50%;border-collapse: collapse;margin-left: auto;margin-right: auto;">
					<tbody>
						<table border="0" id="qrcode-table">
							<tbody>
								<tr>
									<td style="width:30%;">
										<h2>Status</h2>
									</td>
									<td style="width:2%;" class="text-center"><b>:</b></td>
									<td style="width:35%"><span class="status">PAID</span></td>
									<td rowspan="5" style="text-align:center">
										<img src="data:image/svg+xml;base64,{{ $paymentQrCode }}" alt="Payment Qr Code">
									</td>
								</tr>
								<tr>
									<td>
										<h2>Booking Code</h2>
									</td>
									<td class="text-center"><b>:</b></td>
									<td>{{ $payment->booking->code }}</td>
								</tr>
								<tr>
									<td>
										<h2>Payment Code</h2>
									</td>
									<td class="text-center"><b>:</b></td>
									<td>{{ $payment->code }}</td>
								</tr>
								<tr>
									<td>
										<h2>Total Amount</h2>
									</td>
									<td class="text-center"><b>:</b></td>
									<td>{{ $paymentAmount }}</td>
								</tr>
								<tr>
									<td>
										<h2>Date Paid</h2>
									</td>
									<td class="text-center"><b>:</b></td>
									<td>{{ $payment->created_at->format('M jS, Y h:i A') }}</td>
								</tr>
							</tbody>
						</table>
					</tbody>
				</table>
			</div>

		</main>
	</body>

</html>

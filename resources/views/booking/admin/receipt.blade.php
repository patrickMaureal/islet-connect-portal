<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Booking Receipt</title>
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

			#schedule-table {
				border-collapse: collapse;
				width: 100%;
			}

			#islet-table {
				border-collapse: collapse;
				width: 100%;
			}

			#pumpboat-table {
				border-collapse: collapse;
				width: 100%;
			}

			#passenger-table {
				border-collapse: collapse;
				width: 100%;
			}

			#qrcode-table td {
				padding: 3px;
			}

			#schedule-table td {
				padding: 3px;
			}

			#islet-table td {
				padding: 3px;
			}

			#pumpboat-table td {
				padding: 3px;
			}

			#passenger-table td {
				padding: 3px;
			}

			.status{
				font-size: 1rem;
				text-transform: uppercase;
				color:  #50C878;
			}

			h3 {
				font-size: 1.25rem;
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

				<h1 style="text-align: center;font-size: 1.2rem;padding-top:50px;">Booking Receipt</h1>
				<table border="0" id="qrcode-table">
					<tbody>
						<tr>
							<td>
								<h2>Status: <span class="status">PAID</span></h2>
								<h2>Booking Code: <span style="font-weight: lighter">{{ $booking->code }}</span></h2>
								<h2>Booking Date: <span style="font-weight: lighter">{{ $booking->scheduled_date_from->format('M jS, Y') }}</span></h3>
							</td>
							<td style="text-align:right;">
								<img src="data:image/svg+xml;base64,{{ $bookingQrCode }}" alt="Booking Qr Code">
							</td>
						</tr>
					</tbody>
				</table>

				<table border="1" style="width: 100%;border-collapse: collapse;padding-top:15px;">
					<tbody>
						<table border="0" id="schedule-table">
							<thead>
								<tr>
									<th colspan="3" style="font-size: 1.0rem;">Schedule</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>Booking Date:</b> <br> {{ $booking->scheduled_date_from->format('M jS, Y') }} - {{ $booking->scheduled_date_to->format('M jS, Y') }}</td>
									<td><b>Total Day/s:</b> <br> {{ $numberOfDays }}</td>
									<td><b>Total Passengers:</b> <br> {{ $booking->bookingPassengers->count() }}</td>
								</tr>
							</tbody>
						</table>
					</tbody>
				</table>

				<table border="1" style="width: 100%;border-collapse: collapse;padding-top:15px;">
					<tbody>
						<tr>
							<td valign="top" style="width: 50%">
								<table border="0" id="islet-table">
									<thead>
										<tr>
											<th colspan="2" style="font-size: 1.0rem">Islets</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($booking->islets as $islet)
											<tr>
												<td style="width: 2%">{{ $loop->iteration }}.</td>
												<td>{{ $islet->name }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</td>
							<td valign="top" style="width: 50%;">
								<table border="0" id="pumpboat-table">
									<thead>
										<tr>
											<th colspan="3" style="font-size: 1.0rem">Pumpboat</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="width: 25%;">Name</td>
											<td style="width: 2%">:</td>
											<td>{{ $booking->pumpboat->name }}</td>
										</tr>
										<tr>
											<td>Registration #</td>
											<td style="width: 2%">:</td>
											<td>{{ $booking->pumpboat->reg_number }}</td>
										</tr>
										<tr>
											<td>Owner / Captain</td>
											<td style="width: 2%">:</td>
											<td>{{ $booking->pumpboat->pumpboatOwner->first_name }} {{ $booking->pumpboat->pumpboatOwner->last_name }} / {{ $booking->pumpboat->pumpboatCaptain->first_name }} {{ $booking->pumpboat->pumpboatCaptain->last_name }}</td>
										</tr>
										<tr>
											<td>Contact Details</td>
											<td style="width: 2%">:</td>
											<td>{{ $booking->pumpboat->pumpboatOwner->contact_number }} | {{ $booking->pumpboat->pumpboatOwner->email }}</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>

				<table border="1" style="width: 60%;border-collapse: collapse;padding-top:15px;">
					<tbody>
						<table border="0" id="passenger-table">
							<thead>
								<tr>
									<th colspan="2" style="font-size: 1.0rem;text-align: center">Passenger/s</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($booking->bookingPassengers as $passenger)
									<tr>
										<td style="width:2%;">{{ $loop->iteration }}.</td>
										<td>{{ $passenger['name'] }} / {{ $passenger['age'] }} yr/s old  / {{ $passenger['sex'] }} / {{ $passenger['nationality'] }} / {{ $passenger['address'] }} / {{ ($passenger['pwd']) ? 'PWD' : 'Non-PWD' }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</tbody>
				</table>

				<table border="1" style="width: 60%;border-collapse: collapse;padding-top:15px;">
					<tbody>
						<table border="0" id="schedule-table">
							<thead>
								<tr>
									<th colspan="3" style="font-size: 1.0rem;">Payment Information</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>Payment Code:</b> <br> {{ $booking->payment->code }}</td>
									<td><b>Total Amount:</b> <br> {{$booking->payment->amount }}</td>
									<td><b>Date Paid:</b> <br> {{ $booking->payment->created_at ->format('M jS, Y h:i A') }}</td>
								</tr>
							</tbody>
						</table>
					</tbody>
				</table>


			</div>

		</main>
	</body>

</html>

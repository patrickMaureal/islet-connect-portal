<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Analytics:Revenue</title>
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

			#analytics-table td {
				padding: 3px;
			}

			#chart-image {
				max-width: 100%;
				width: 100%;
				height: auto;
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

				<h1 style="text-align: center;font-size: 1.2rem;padding-top:50px;">Revenue Report</h1>

				<table border="1" style="width: 100%;border-collapse: collapse;padding-top:15px;">
					<tbody>
						<table border="0" id="analytics-table">
							<thead>
								<tr>
									<th colspan="3" style="font-size: 1.0rem;"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<img src="{{ $chartImage }}" alt="Chart Image" id="chart-image">
									</td>
								</tr>
							</tbody>
						</table>
					</tbody>
				</table>

			</div>

		</main>
	</body>

</html>

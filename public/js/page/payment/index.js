$(function () {
	// holds the id when button click
	let this_id;
	// modal
	let modal = $('#payment-modal');
	// start => datatable
	let table = $("#payment-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/payments/table",
			dataType: "json",
			error: function (errors) {
				toast.fire({
					icon: 'error',
					title: 'Invalid Data Token.',
				})
			},
		},
		language: {
			searchPlaceholder: "Search Records..",
		},
		columns: [
			{ data: "payment_code", name: "payments.code" },
			{ data: "code", name: "bookings.code" },
			{ data: "or_number", name: "or_number" },
			{ data: "amount", name: "payments.amount", searchable: false, },
			{ data: "payment_date", name: "payment_date" },
			{
				data: "action",
				name: "action",
				orderable: false,
				searchable: false,
			},
		],
	});
	// end
	// custom search
	$("#custom-search-field").keyup(function () {
		table.search($(this).val()).draw();
	});
	// custom page length
	$("#custom-page-length").change(function () {
		table.page.len($(this).val()).draw();
	}).trigger('change');

	// start => button delete
	$('body').on('click', '.delete-payment', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-payment', function () {
		$.ajax({
			type: 'DELETE',
			url: '/payments/' + this_id,
			dataType: 'json',
			beforeSend: function () {
				buttons('destroy-payment', 'start');
			}
		})
		.done(function (response) {
			table.ajax.reload();
			toast.fire({
				icon: 'success',
				title: response.message,
			});
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			toast.fire({
				icon: 'error',
				title: jqXHR.responseJSON.message,
			});
		})
		.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
			buttons('destroy-payment', 'finish');
			modal.modal('hide');
		});
	});
	// end
});

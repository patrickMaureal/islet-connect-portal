$(function () {
	// holds the id when button click
	let this_id;
	// modals
	let confirmModal = $('#confirm-booking-modal');
	let cancelModal = $('#cancel-booking-modal');
	let revertModal = $('#revert-booking-modal');
	
	// start => datatable
	let table = $("#booking-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/bookings/table",
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
			{ data: "code", name: "code" },
			{ data: "status", name: "status" },
			{ data: "created_at", name: "created_at" },
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
	// start => button cancel
	$('body').on('click', '.cancel-booking', function () {
		this_id = $(this).attr('data-id');
		cancelModal.modal('show');
	});
	// end

	//start => modal button cancel
	$('body').on('click', '#cancel-booking', function () {
		$.ajax({
			type: 'PUT',
			url: '/bookings/cancel/' + this_id,
			dataType: 'json',
			beforeSend: function () {
				buttons('cancel-booking', 'start');
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
				buttons('cancel-booking', 'finish');
				cancelModal.modal('hide');
			});
	});
	// end

	// start => button confirm
	$('body').on('click', '.confirm-booking', function () {
		this_id = $(this).attr('data-id');
		confirmModal.modal('show');
	});
	// end

	//start => modal button confirm
	$('body').on('click', '#confirm-booking', function () {
		$.ajax({
			type: 'PUT',
    	url: '/bookings/confirm/' + this_id,
    	dataType: 'json',
    	beforeSend: function () {
        buttons('confirm-booking', 'start');
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
			buttons('confirm-booking', 'finish');
			confirmModal.modal('hide');
		});
	});
	// end

	// start => button confirm
	$('body').on('click', '.revert-booking', function () {
		this_id = $(this).attr('data-id');
		revertModal.modal('show');
	});
	// end

	//start => modal button revert
	$('body').on('click', '#revert-booking', function () {
		$.ajax({
			type: 'PUT',
    	url: '/bookings/revert/' + this_id,
    	dataType: 'json',
    	beforeSend: function () {
        buttons('revert-booking', 'start');
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
			buttons('revert-booking', 'finish');
			revertModal.modal('hide');
		});
	});
	// end
});

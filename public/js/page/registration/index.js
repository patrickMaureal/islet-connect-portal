$(function () {
	// holds the id when button delete click
	let this_id;
	// modal
	let modal = $('#registration-modal');
	let denyModal = $('#deny-registration-modal');
	// start => datatable
	let table = $("#registration-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/registrations/table",
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
			{ data: "name", name: "name" },
			{ data: "email", name: "email" },
			{ data: "role", name: "role" },
			{ data: "created_at", name: "created_at" },
			{ data: "status", name: "status" },
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

	// start => button verify
	$('body').on('click', '.verify-registration', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end

	//start => modal button verify
	$('body').on('click', '#verify-registration', function () {
		$.ajax({
			type: 'POST',
    	url: '/registrations/verify/' + this_id,
    	dataType: 'json',
    	beforeSend: function () {
        buttons('verify-registration', 'start');
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
			buttons('verify-registration', 'finish');
			modal.modal('hide');
		});
	});
	// end

	// start => button deny
	$('body').on('click', '.deny-registration', function () {
		this_id = $(this).attr('data-id');
		denyModal.modal('show');
	});

	//start => modal button deny
	$('body').on('click', '#deny-registration', function () {
		$.ajax({
			type: 'POST',
    	url: '/registrations/deny/' + this_id,
    	dataType: 'json',
    	beforeSend: function () {
        buttons('deny-registration', 'start');
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
			buttons('deny-registration', 'finish');
			denyModal.modal('hide');
		});
	});
	// end


});

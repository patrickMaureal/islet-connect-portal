$(function () {
	// holds the id when button delete click
	let this_id;
	// modal
	let modal = $('#resident-modal');
	// start => datatable
	let table = $("#resident-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/residents/table",
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
			{ data: "first_name", name: "first_name" },
			{ data: "last_name", name: "last_name" },
			{ data: "name_extension", name: "name_extension" },
			{ data: "gender", name: "gender" },
			{ data: "employment_status", name: "employment_status" },
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
	// start => button delete
	$('body').on('click', '.delete-resident', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-resident', function () {
		$.ajax({
			type: 'DELETE',
			url: '/residents/' + this_id,
			dataType: 'json',
			beforeSend: function () {
				buttons('destroy-resident', 'start');
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
				buttons('destroy-resident', 'finish');
				modal.modal('hide');
			});
	});
	// end
});

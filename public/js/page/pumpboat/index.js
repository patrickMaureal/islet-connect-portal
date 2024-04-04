$(function () {
  // holds the id when button delete click
  let this_id;
  // modal
  let modal = $('#pumpboat-modal');
	// start => datatable
	let table = $("#pumpboat-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/pumpboats/table",
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
			{ data: "o_name", name: "o_name" },
			{ data: "c_name", name: "c_name" },
			{ data: "created_at", name: "created_at" },
			{ data: "action", name: "action", orderable: false, searchable: false },
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
	$('body').on('click', '.delete-pumpboat', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-pumpboat', function () {
		$.ajax({
			type: 'DELETE',
			url: '/pumpboats/' + this_id,
			dataType: 'json',
			beforeSend : function() {
				buttons('destroy-pumpboat', 'start');
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
		.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown){
			buttons('destroy-pumpboat', 'finish');
			modal.modal('hide');
		});
	});
	// end
});

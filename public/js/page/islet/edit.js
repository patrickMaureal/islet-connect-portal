$(function () {
  // holds the id when button delete click
  let this_id;
  // modal
  let modal = $('#islet-attachment-modal');
  // start => button delete
	$('body').on('click', '.delete-islet-attachment', function (event) {
		event.preventDefault();
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-islet-attachment', function () {
		$.ajax({
			type: 'DELETE',
			url: '/islets/destroy-attachment/' + this_id,
			dataType: 'json',
			beforeSend : function() {
				buttons('destroy-islet-attachment', 'start');
			}
		})
		.done(function (response) {
			toast.fire({
				icon: 'success',
				title: response.message,
			});

			// reload page
			setTimeout(()=>{
				document.location.reload();
			}, 1500);
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			toast.fire({
				icon: 'error',
				title: jqXHR.responseJSON.message,
			});
		})
		.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown){
			buttons('destroy-islet-attachment', 'finish');
			modal.modal('hide');
		});
	});
	// end
});

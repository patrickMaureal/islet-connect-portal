$(function () {
  // holds the id when button delete click
  let this_id;
  // modal
  let modal = $('#attachments-modal');
  // start => button delete
	$('body').on('click', '.destroy-attachment', function (event) {
		event.preventDefault();
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-attachments', function () {
		$.ajax({
			type: 'DELETE',
			url: '/islets/activities/attachments/' + this_id,
			dataType: 'json',
			beforeSend : function() {
				buttons('destroy-attachments', 'start');
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
			}, 1250);
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			toast.fire({
				icon: 'error',
				title: jqXHR.responseJSON.message,
			});
		})
		.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown){
			buttons('destroy-attachments', 'finish');
			modal.modal('hide');
		});
	});
	// end
});
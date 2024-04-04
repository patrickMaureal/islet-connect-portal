// token is use for every form submit
// prevent csrf attacks
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
// end
// start => spinner and button function
function buttons(button, type) {
	if (type == 'start') {
		$('.spinner').show();
		$('#close-button').attr('disabled', 'true');
		$('#' + button).attr('disabled', 'true');

	}

	if (type == 'finish') {
		$('.spinner').hide();
		$('#close-button').removeAttr('disabled');
		$('#' + button).removeAttr('disabled');
	}
}
// end
//SweetAlert2 Toast
const toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 5000
});
// end
$(function () {
	// holds the id when button delete click
	let this_id;
	// holds image uri
	let image
	// modal
	let modal = $('#resident-modal');

	Webcam.set({
    width: 750, // live preview size
    height: 400,
    dest_width: 888, // device capture size
    dest_height: 500,
    crop_width: 500, // final cropped size
    crop_height: 500,
    image_format: 'jpeg',
    jpeg_quality: 100

	});

	$('#enable-camera').on('click', function () {
		// turn camera on
		Webcam.attach('#my_camera');
	});

	$('#reset-camera').on('click', function () {
		// turn camera off
		Webcam.reset();
	});

	// Code to handle taking the snapshot and displaying it locally
	$('#snapshot').on('click', function () {
		// take snapshot and get image data
		Webcam.snap(function (data_uri) {

		// display results in page
		document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';

		// pass value
		image = data_uri;

		});
	});
	// start => update button click
	$('body').on('click', '#update-resident-picture', function() {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#accept', function () {
		$.ajax({
			type: 'POST',
			url: '/residents/profile-picture',
			data: { id: this_id, image: image },
			dataType: 'json',
			beforeSend: function () {
				buttons('accept', 'start');
			}
		})
		.done(function (response) {
			$('#user-image').attr('src', image);
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
			Webcam.reset();
			buttons('accept', 'finish');
			modal.modal('hide');
		});
	});
	// end
});

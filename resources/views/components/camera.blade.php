<div class="modal fade" data-backdrop="static" data-keyboard="false" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="card card-body border-0 shadow mb-0 ">
				<h2 class="h5 mb-04" style="text-align: center;">User Profile Webcam</h2>

				{{-- CSS --}}
				<style>
					#my_camera {
						width: 400px;
						height: 400px;
						border: 2px solid #5a5a5a;
						box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
						background-color: #ffffff;
						margin: auto;
					}
				</style>

				{{-- webcam buttons --}}
				<div id="my_camera"></div>
				<div class="button-container d-flex justify-content-center">
					<input type=button class="btn btn-gray-800 my-3 btn-sm w-25 " value="Show Camera" id="enable-camera">
					<input type=button class="btn btn-gray-800 my-3 btn-sm w-25 mx-3" value="Hide Camera" id="reset-camera">
					<input type=button class="btn btn-gray-800 my-3 btn-sm w-25" value="Take Snapshot" id="snapshot">
				</div>
				{{-- webcam --}}
				<div class="d-flex justify-content-center align-items-center">
					<div id="results" class="text-center"></div>
				</div>

			</div>
			<div class="modal-footer">
				<button id="{{ $buttonId }}" type="button" class="btn btn-secondary">Accept</button>
				<button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
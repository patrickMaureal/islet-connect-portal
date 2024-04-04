<?php


use App\Http\Controllers\Web\Analytics\Demographic\DemographicController;
use App\Http\Controllers\Web\Analytics\Nationality\NationalityController;
use App\Http\Controllers\Web\Analytics\Passenger\PassengerController;
use App\Http\Controllers\Web\Analytics\Revenue\RevenueController;
use App\Http\Controllers\Web\Booking\BookingController as BookingAdminController;
use App\Http\Controllers\Web\Booking\CancelBooking;
use App\Http\Controllers\Web\Booking\ConfirmBooking;
use App\Http\Controllers\Web\Booking\PrintBooking;
use App\Http\Controllers\Web\Booking\RevertBooking;
use App\Http\Controllers\Web\Dashboard\DashboardController;
use App\Http\Controllers\Web\Home\BookingController;
use App\Http\Controllers\Web\Home\SearchIsletController;
use App\Http\Controllers\Web\Islet\AttachmentController;
use App\Http\Controllers\Web\Islet\IsletController;
use App\Http\Controllers\Web\Mobile\MobileBooking;
use App\Http\Controllers\Web\Payment\PaymentController;
use App\Http\Controllers\Web\Payment\PrintPayment;
use App\Http\Controllers\Web\Profile\ProfileController;
use App\Http\Controllers\Web\Pumpboat\PumpboatController;
use App\Http\Controllers\Web\Pumpboat\PumpboatRoute;
use App\Http\Controllers\Web\Registration\DenyRegistration;
use App\Http\Controllers\Web\Registration\RegistrationController;
use App\Http\Controllers\Web\Registration\VerifyRegistration;
use App\Http\Controllers\Web\Resident\ResidentController;
use App\Http\Controllers\Web\User\UserController;
use App\Models\Islet\Islet;
use App\Services\Csp\Policies\CustomPolicy;
use Illuminate\Support\Facades\Route;
use Spatie\Csp\AddCspHeaders;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(AddCspHeaders::class . ':' . CustomPolicy::class)->get('/', function () {
	$islets = Islet::all();
	return view('welcome',compact('islets'));
});

// search-islets
Route::middleware(AddCspHeaders::class . ':' . CustomPolicy::class)->prefix('search-islets')->name('search-islets.')->group(function () {
	Route::get('/', [SearchIsletController::class, 'index'])->name('index');
	Route::get('islet-profile/{islet}', [SearchIsletController::class, 'show'])->name('islet-profile');
});

Route::get('/booking',[BookingController::class,'index' ])->name('booking.index');
Route::get('/mobile/booking', MobileBooking::class)->name('mobile.booking');

Route::middleware(['auth', 'verified', AddCspHeaders::class . ':' . CustomPolicy::class])->group(function () {

	//Dashboard
	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

	// profile
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::post('profiles/profile-picture', [ProfileController::class, 'storeImage'])->name('profile-picture');

	Route::prefix('analytics')->name('analytics.')->group(function () {
		// revenue
		Route::prefix('revenues')->name('revenues.')->group( function() {
			Route::get('/', [RevenueController::class, 'index'])->name('index');
			Route::get('chart', [RevenueController::class, 'showChart'])->name('table');
			Route::post('print', [RevenueController::class, 'printChart'])->name('print');
		});
		Route::prefix('demographics')->name('demographics.')->group( function() {
			Route::get('/', [DemographicController::class, 'index'])->name('index');
			Route::get('chart', [DemographicController::class, 'showChart'])->name('chart');
			Route::post('print', [DemographicController::class, 'printChart'])->name('print');
		});
		Route::prefix('nationalities')->name('nationalities.')->group( function() {
			Route::get('/', [NationalityController::class, 'index'])->name('index');
			Route::get('chart', [NationalityController::class, 'showChart'])->name('chart');
			Route::post('print', [NationalityController::class, 'printChart'])->name('print');
		});
		Route::prefix('passengers')->name('passengers.')->group( function() {
			Route::get('/', [PassengerController::class, 'index'])->name('index');
			Route::get('chart', [PassengerController::class, 'showChart'])->name('chart');
			Route::post('print', [PassengerController::class, 'printChart'])->name('print');
		});
	});

	// Administrator role ONLY
	Route::group(['middleware' => ['role:Administrator']], function () {

		// users
		Route::prefix('users')->name('users.')->group(function () {
			Route::get('table', [UserController::class, 'showTable'])->name('table');
			Route::post('profile-picture', [UserController::class, 'storeImage'])->name('profile-picture');
		});
		Route::resource('users', UserController::class);

		//residents
		Route::prefix('residents')->name('residents.')->group(function () {
			Route::get('table', [ResidentController::class, 'showTable'])->name('table');
			Route::post('profile-picture', [ResidentController::class, 'storeImage'])->name('profile-picture');
		});
		Route::resource('residents', ResidentController::class);

		// bookings
		Route::prefix('bookings')->name('bookings.')->group(function () {
			Route::get('table', [BookingAdminController::class, 'showTable'])->name('table');
			Route::put('/confirm/{booking}', ConfirmBooking::class)->name('confirm');
			Route::put('/cancel/{booking}', CancelBooking::class)->name('cancel');
			Route::put('/revert/{booking}', RevertBooking::class)->name('revert');
			Route::get('/print/{booking}', PrintBooking::class)->name('print');
		});
		Route::resource('bookings', BookingAdminController::class);

		// payments
		Route::prefix('payments')->name('payments.')->group(function () {
			Route::get('table', [PaymentController::class, 'showTable'])->name('table');
			Route::get('/print/{payment}', PrintPayment::class)->name('print');
		});
		Route::resource('payments', PaymentController::class)->only(['index', 'create', 'store', 'destroy']);

		// registrations
		Route::prefix('registrations')->name('registrations.')->group(function () {
			Route::get('table', [RegistrationController::class, 'showTable'])->name('table');
			Route::post('/verify/{registration}', VerifyRegistration::class)->name('verify');
			Route::post('/deny/{registration}', DenyRegistration::class)->name('deny');
		});
		Route::resource('registrations', RegistrationController::class);

	});

	// Administor or LGU role ONLY
	Route::group(['middleware' => ['role:Administrator|LGU']], function () {

		// islets
		Route::prefix('islets')->name('islets.')->group(function () {
			Route::get('table', [IsletController::class, 'showTable'])->name('table');
			Route::delete('destroy-attachment/{media}', [IsletController::class, 'destroyAttachment'])->name('destroy-attachment');
			Route::get('{islet}/activities/{islet_activity}/attachments',[AttachmentController::class, 'index'])->name('activities.attachments');
			Route::post('activities/{islet_activity}/attachments',[AttachmentController::class, 'store'])->name('activities.attachments.store');
			Route::get('activities/attachments/{attachment}',[AttachmentController::class, 'download'])->name('activities.attachments.download');
			Route::delete('activities/attachments/{media}',[AttachmentController::class, 'destroy'])->name('destroy-attachments');
		});
		Route::resource('islets', IsletController::class);

		//pumpboats
		Route::prefix('pumpboats')->name('pumpboats.')->group(function () {
			Route::get('table', [PumpboatController::class, 'showTable'])->name('table');
			Route::delete('destroy-attachment/{media}', [PumpboatController::class, 'destroyAttachment'])->name('destroy-attachment');

			Route::put('/routes/{pumpboat}', PumpboatRoute::class)->name('routes');

		});
		Route::resource('pumpboats', PumpboatController::class);

	});

});

require __DIR__ . '/auth.php';

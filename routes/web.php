<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('index');

//newspapers
Route::get('newspapers', [App\Http\Controllers\Frontend\NewspaperController::class, 'index'])->name('newspaper.index');
Route::get('newspapers/{slug}', [App\Http\Controllers\Frontend\NewspaperController::class, 'show'])->name('newspaper.show');

//blood donor
Route::get('blood-donor', [App\Http\Controllers\Frontend\BloodDonorController::class, 'index'])->name('blood-donor.index');

//hospital
Route::get('hospital', [App\Http\Controllers\Frontend\HospitalController::class, 'index'])->name('hospital.index');

//ambulance
Route::get('ambulance', [App\Http\Controllers\Frontend\AmbulanceController::class, 'index'])->name('ambulance.index');

//doctor
Route::get('doctor', [App\Http\Controllers\Frontend\DoctorController::class, 'index'])->name('doctor.index');
Route::get('doctor/{id}', [App\Http\Controllers\Frontend\DoctorController::class, 'show'])->name('doctor.show');

//journalist
Route::get('journalist', [App\Http\Controllers\Frontend\JournalistController::class, 'index'])->name('journalist.index');


//lawyer
Route::get('lawyer', [App\Http\Controllers\Frontend\LawyerController::class, 'index'])->name('lawyer.index');

//fire-service
Route::get('fire-service', [App\Http\Controllers\Frontend\FireServiceController::class, 'index'])->name('fireservice.index');

//restaurant
Route::get('restaurant', [App\Http\Controllers\Frontend\RestaurantController::class, 'index'])->name('restaurant.index');

//hotel
Route::get('hotel', [App\Http\Controllers\Frontend\HotelController::class, 'index'])->name('hotel.index');

//hotel
Route::get('bus-ticket', [App\Http\Controllers\Frontend\BusController::class, 'index'])->name('bus.index');

Route::post('bus-ticket/result', [App\Http\Controllers\Frontend\BusController::class, 'search'])->name('bus.search');


//admin
Route::prefix('admin')->group(function () {

	Auth::routes();

	Route::get('', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

	// newspaper
	Route::resource('newspaper', App\Http\Controllers\Backend\NewspaperController::class, ['names' => 'admin.newspaper']);

	//address
	//district
	Route::resource('district', App\Http\Controllers\Backend\DistrictController::class, ['names' => 'admin.district']);

	//city
	Route::resource('city', App\Http\Controllers\Backend\CityController::class, ['names' => 'admin.city']);

	//blood
	Route::resource('blood', App\Http\Controllers\Backend\BloodController::class, ['names' => 'admin.blood']);

	Route::resource('blood-donor', App\Http\Controllers\Backend\BloodDonorController::class, ['names' => 'admin.blood-donor']);

	//newspaper
	Route::resource('hospital', App\Http\Controllers\Backend\HospitalController::class, ['names' => 'admin.hospital']);

	//ambulance
	Route::resource('ambulance', App\Http\Controllers\Backend\AmbulanceController::class, ['names' => 'admin.ambulance']);

	//food
	Route::resource('food', App\Http\Controllers\Backend\FoodController::class, ['names' => 'admin.food']);

	Route::resource('restaurant', App\Http\Controllers\Backend\RestaurantController::class, ['names' => 'admin.restaurant']);

	//fire servive
	Route::resource('fire-service', App\Http\Controllers\Backend\FireServiceController::class, ['names' => 'admin.fireservice']);
	
	//journalist
	Route::resource('journalist', App\Http\Controllers\Backend\JournalistController::class, ['names' => 'admin.journalist']);


	//law
	Route::resource('law-department', App\Http\Controllers\Backend\LawDepartmentController::class, ['names' => 'admin.lawdepartment']);
	Route::resource('lawyer', App\Http\Controllers\Backend\LawyerController::class, ['names' => 'admin.lawyer']);

	//doctor
	Route::resource('doctor-type', App\Http\Controllers\Backend\DoctorTypeController::class, ['names' => 'admin.medical']);

	Route::resource('doctor', App\Http\Controllers\Backend\DoctorController::class, ['names' => 'admin.doctor']);

	Route::get('doctor/chamber/{id}', [App\Http\Controllers\Backend\ChamberController::class, 'index'])->name('admin.chamber.index');
	Route::post('chamber/store', [App\Http\Controllers\Backend\ChamberController::class, 'store'])->name('admin.chamber.store');
	Route::get('chamber/edit/{id}', [App\Http\Controllers\Backend\ChamberController::class, 'edit'])->name('admin.chamber.edit');
	Route::put('chamber/edit/{id}', [App\Http\Controllers\Backend\ChamberController::class, 'update'])->name('admin.chamber.update');


	//bus route
	Route::resource('bus-route', App\Http\Controllers\Backend\BusRouteController::class, ['names' => 'admin.busroute']);
	Route::resource('bus-type', App\Http\Controllers\Backend\BusTypeController::class, ['names' => 'admin.bustype']);
	Route::resource('bus', App\Http\Controllers\Backend\BusController::class, ['names' => 'admin.bus']);
	Route::resource('bus-ticket', App\Http\Controllers\Backend\BusTicketController::class, ['names' => 'admin.busticket']);
	Route::resource('bus-counter', App\Http\Controllers\Backend\BusCounterController::class, ['names' => 'admin.buscounter']);



	// ehelp
	Route::resource('ehelp', App\Http\Controllers\Backend\EhelpController::class, ['names' => 'admin.ehelp']);

	// govt office
	Route::resource('govt-office', App\Http\Controllers\Backend\GovtOfficeController::class, ['names' => 'admin.govtoffice']);

	// job
	Route::resource('job', App\Http\Controllers\Backend\JobController::class, ['names' => 'admin.job']);

	// training center
	Route::resource('training-center', App\Http\Controllers\Backend\TrainingCenterController::class, ['names' => 'admin.trainingcenter']);

	// helpline
	Route::resource('helpline', App\Http\Controllers\Backend\HelplineController::class, ['names' => 'admin.helpline']);

	// business
	Route::resource('business-type', App\Http\Controllers\Backend\BusinessTypeController::class, ['names' => 'admin.businesstype']);
	Route::resource('business-idea', App\Http\Controllers\Backend\BusinessIdeaController::class, ['names' => 'admin.businessidea']);

	// library
	Route::resource('library', App\Http\Controllers\Backend\LibraryController::class, ['names' => 'admin.library']);

	// educational institute
	Route::resource('educational-institute', App\Http\Controllers\Backend\EducationalInstituteController::class, ['names' => 'admin.educationalinstitute']);
	
	
	// train ticket
	Route::resource('train-route', App\Http\Controllers\Backend\TrainRouteController::class, ['names' => 'admin.trainroute']);
	Route::resource('train-class', App\Http\Controllers\Backend\TrainClassController::class, ['names' => 'admin.trainclass']);
	Route::resource('train', App\Http\Controllers\Backend\TrainController::class, ['names' => 'admin.train']);
	Route::resource('train-ticket', App\Http\Controllers\Backend\TrainTicketController::class, ['names' => 'admin.trainticket']);


	//hotel
	Route::resource('hotel', App\Http\Controllers\Backend\HotelController::class, ['names' => 'admin.hotel']);



});

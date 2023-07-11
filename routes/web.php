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

});
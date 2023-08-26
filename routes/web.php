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

Route::get('theme', [App\Http\Controllers\Frontend\HomeController::class, 'theme'])->name('theme');

//newspapers
Route::get('newspapers', [App\Http\Controllers\Frontend\NewspaperController::class, 'index'])->name('newspaper.index');
Route::get('newspapers/{slug}', [App\Http\Controllers\Frontend\NewspaperController::class, 'show'])->name('newspaper.show');

//ehelp
Route::get('ehelp', [App\Http\Controllers\Frontend\EhelpController::class, 'index'])->name('ehelp.index');
Route::get('ehelp/{id}', [App\Http\Controllers\Frontend\EhelpController::class, 'show'])->name('ehelp.show');

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

//bus ticket
Route::get('bus-ticket', [App\Http\Controllers\Frontend\BusController::class, 'index'])->name('bus.index');
Route::post('bus-ticket/result', [App\Http\Controllers\Frontend\BusController::class, 'search'])->name('bus.search');

//train ticket
Route::get('train-ticket', [App\Http\Controllers\Frontend\TrainController::class, 'index'])->name('train.index');
Route::post('train-ticket/result', [App\Http\Controllers\Frontend\TrainController::class, 'search'])->name('train.search');

//training_centers
Route::get('training-centers', [App\Http\Controllers\Frontend\TrainingCenterController::class, 'index'])->name('training_centers.index');

//govt_offices
Route::get('govt-office', [App\Http\Controllers\Frontend\GovtOfficeController::class, 'index'])->name('govt_office.index');

//job
Route::get('jobs', [App\Http\Controllers\Frontend\JobController::class, 'index'])->name('job.index');

//help line
Route::get('help-line', [App\Http\Controllers\Frontend\HelplineController::class, 'index'])->name('helpline.index');

//police station
Route::get('police-station', [App\Http\Controllers\Frontend\ThanaController::class, 'index'])->name('thana.index');

Route::get('police-station/{id}/police', [App\Http\Controllers\Frontend\ThanaController::class, 'show'])->name('thana.show');


//school
Route::get('educational-institute', [App\Http\Controllers\Frontend\EduInstituteController::class, 'index'])->name('school.index');

//library
Route::get('libraries', [App\Http\Controllers\Frontend\LibraryController::class, 'index'])->name('library.index');

//business idea
Route::get('business-ideas', [App\Http\Controllers\Frontend\BusinessIdeaController::class, 'index'])->name('business.index');
Route::get('business-ideas/{slug}', [App\Http\Controllers\Frontend\BusinessIdeaController::class, 'show'])->name('business.show');


//live tv
Route::get('live-tv', [App\Http\Controllers\Frontend\PageController::class, 'livetv'])->name('livetv.index');


//blog
Route::get('blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');


//contact us
Route::get('contact-us', [App\Http\Controllers\Frontend\PageController::class, 'contact'])->name('contact.index');

//about us
Route::get('about-us', [App\Http\Controllers\Frontend\PageController::class, 'about'])->name('about.index');




// filter
Route::get('get-city/{id}', [App\Http\Controllers\Frontend\FilterController::class, 'getCity']);



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


	// tourist place
	Route::resource('place-type', App\Http\Controllers\Backend\PlaceTypeController::class, ['names' => 'admin.placetype']);
	Route::resource('tourist-place', App\Http\Controllers\Backend\TouristPlaceController::class, ['names' => 'admin.touristplace']);

	// shop
	Route::resource('shop-category', App\Http\Controllers\Backend\ShopCategoryController::class, ['names' => 'admin.shopcategory']);
	Route::resource('shop', App\Http\Controllers\Backend\ShopController::class, ['names' => 'admin.shop']);

	// thana-police
	Route::resource('thana', App\Http\Controllers\Backend\ThanaController::class, ['names' => 'admin.thana']);
	Route::resource('police', App\Http\Controllers\Backend\PoliceController::class, ['names' => 'admin.police']);

	// blog
	Route::resource('blog-category', App\Http\Controllers\Backend\BlogCategoryController::class, ['names' => 'admin.blogcategory']);
	Route::resource('blog', App\Http\Controllers\Backend\BlogController::class, ['names' => 'admin.blog']);


	// palli bidyut
	Route::resource('palli-bidyut', App\Http\Controllers\Backend\PalliBidyutController::class, ['names' => 'admin.pallibidyut']);
	
	// story
	Route::resource('story-category', App\Http\Controllers\Backend\StoryCategoryController::class, ['names' => 'admin.storycategory']);
	Route::resource('story', App\Http\Controllers\Backend\StoryController::class, ['names' => 'admin.story']);

	// testimonial
	Route::resource('testimonial', App\Http\Controllers\Backend\TestimonialController::class, ['names' => 'admin.testimonial']);


	// banner
	Route::resource('banner', App\Http\Controllers\Backend\BannerController::class, ['names' => 'admin.banner']);
	
	
	//user
	Route::resource('user', App\Http\Controllers\Backend\UserController::class, ['names' => 'admin.user']);

	Route::get('change-password/{id}', [App\Http\Controllers\Backend\UserController::class, 'updatePasswordView'])->name('admin.password.edit');
	Route::put('change-password/{id}', [App\Http\Controllers\Backend\UserController::class, 'updatePassword'])->name('admin.password.update');
	
	
	//setting
	Route::get('setting', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('admin.setting.index');
	Route::post('setting/banner/update', [App\Http\Controllers\Backend\SettingController::class, 'updateBanner'])->name('admin.setting.banner');
	Route::post('setting/about/update', [App\Http\Controllers\Backend\SettingController::class, 'updateAbout'])->name('admin.setting.about');
	Route::post('setting/contact/update', [App\Http\Controllers\Backend\SettingController::class, 'updateContact'])->name('admin.setting.contact');
	Route::post('setting/page/update', [App\Http\Controllers\Backend\SettingController::class, 'updatePage'])->name('admin.setting.page');




});

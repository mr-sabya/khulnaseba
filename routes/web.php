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
Route::get('blood-donor/search', [App\Http\Controllers\Frontend\BloodDonorController::class, 'search'])->name('blood-donor.search');

//hospital
Route::get('hospital', [App\Http\Controllers\Frontend\HospitalController::class, 'index'])->name('hospital.index');
Route::get('hospital/search', [App\Http\Controllers\Frontend\HospitalController::class, 'search'])->name('hospital.search');

//ambulance
Route::get('ambulance', [App\Http\Controllers\Frontend\AmbulanceController::class, 'index'])->name('ambulance.index');
Route::get('ambulance/search', [App\Http\Controllers\Frontend\AmbulanceController::class, 'search'])->name('ambulance.search');

//doctor
Route::get('doctor', [App\Http\Controllers\Frontend\DoctorController::class, 'index'])->name('doctor.index');
Route::get('doctor/{id}', [App\Http\Controllers\Frontend\DoctorController::class, 'show'])->name('doctor.show');
Route::get('doctor-search', [App\Http\Controllers\Frontend\DoctorController::class, 'search'])->name('doctor.search');

//journalist
Route::get('journalist', [App\Http\Controllers\Frontend\JournalistController::class, 'index'])->name('journalist.index');
Route::get('journalist/result', [App\Http\Controllers\Frontend\JournalistController::class, 'search'])->name('journalist.search');


//lawyer
Route::get('lawyer', [App\Http\Controllers\Frontend\LawyerController::class, 'index'])->name('lawyer.index');
Route::get('lawyer/result', [App\Http\Controllers\Frontend\LawyerController::class, 'search'])->name('lawyer.search');

//fire-service
Route::get('fire-service', [App\Http\Controllers\Frontend\FireServiceController::class, 'index'])->name('fireservice.index');
Route::get('fire-service/result', [App\Http\Controllers\Frontend\FireServiceController::class, 'search'])->name('fireservice.search');

//restaurant
Route::get('restaurant', [App\Http\Controllers\Frontend\RestaurantController::class, 'index'])->name('restaurant.index');
Route::get('restaurant/food/{slug}', [App\Http\Controllers\Frontend\RestaurantController::class, 'show'])->name('restaurant.show');
Route::get('restaurant/result', [App\Http\Controllers\Frontend\RestaurantController::class, 'search'])->name('restaurant.search');

//hotel
Route::get('hotel', [App\Http\Controllers\Frontend\HotelController::class, 'index'])->name('hotel.index');
Route::get('hotel/result', [App\Http\Controllers\Frontend\HotelController::class, 'search'])->name('hotel.search');

//bus ticket
Route::get('bus-ticket', [App\Http\Controllers\Frontend\BusController::class, 'index'])->name('bus.index');
Route::get('get-bus/{id}', [App\Http\Controllers\Frontend\FilterController::class, 'getBus'])->name('bus.get');
Route::post('bus-ticket/result', [App\Http\Controllers\Frontend\BusController::class, 'search'])->name('bus.search');

//train ticket
Route::get('train-ticket', [App\Http\Controllers\Frontend\TrainController::class, 'index'])->name('train.index');
Route::post('train-ticket/result', [App\Http\Controllers\Frontend\TrainController::class, 'search'])->name('train.search');

//training_centers
Route::get('training-centers', [App\Http\Controllers\Frontend\TrainingCenterController::class, 'index'])->name('training_centers.index');
Route::get('training-centers/result', [App\Http\Controllers\Frontend\TrainingCenterController::class, 'search'])->name('training_centers.search');

//govt_offices
Route::get('govt-office', [App\Http\Controllers\Frontend\GovtOfficeController::class, 'index'])->name('govt_office.index');
Route::get('govt-office/result', [App\Http\Controllers\Frontend\GovtOfficeController::class, 'search'])->name('govt_office.search');

//govt_offices
Route::get('electricity', [App\Http\Controllers\Frontend\ElectricityController::class, 'index'])->name('electricity.index');
Route::get('electricity/result', [App\Http\Controllers\Frontend\ElectricityController::class, 'search'])->name('electricity.search');

//job
Route::get('jobs', [App\Http\Controllers\Frontend\JobController::class, 'index'])->name('job.index');

//help line
Route::get('help-line', [App\Http\Controllers\Frontend\HelplineController::class, 'index'])->name('helpline.index');

//police station
Route::get('police-station', [App\Http\Controllers\Frontend\ThanaController::class, 'index'])->name('thana.index');
Route::get('police-station/result', [App\Http\Controllers\Frontend\ThanaController::class, 'search'])->name('thana.search');

Route::get('police-station/{id}/police', [App\Http\Controllers\Frontend\ThanaController::class, 'show'])->name('thana.show');


//school
Route::get('educational-institute', [App\Http\Controllers\Frontend\EduInstituteController::class, 'index'])->name('school.index');
Route::get('educational-institute/result', [App\Http\Controllers\Frontend\EduInstituteController::class, 'search'])->name('school.search');

//library
Route::get('libraries', [App\Http\Controllers\Frontend\LibraryController::class, 'index'])->name('library.index');
Route::get('libraries/result', [App\Http\Controllers\Frontend\LibraryController::class, 'search'])->name('library.search');

//business idea
Route::get('business-ideas', [App\Http\Controllers\Frontend\BusinessIdeaController::class, 'index'])->name('business.index');
Route::get('business-ideas/{slug}', [App\Http\Controllers\Frontend\BusinessIdeaController::class, 'show'])->name('business.show');
Route::get('business-ideas/type/{id}', [App\Http\Controllers\Frontend\BusinessIdeaController::class, 'type'])->name('business.type');


//live tv
Route::get('live-tv', [App\Http\Controllers\Frontend\PageController::class, 'livetv'])->name('livetv.index');


//blog
Route::get('blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');


//plane service
Route::get('plane-tickets', [App\Http\Controllers\Frontend\PlaneController::class, 'index'])->name('plane.index');
Route::get('plane-tickets/result', [App\Http\Controllers\Frontend\PlaneController::class, 'search'])->name('plane.search');

//airline
Route::get('airline/{slug}', [App\Http\Controllers\Frontend\PlaneController::class, 'airline'])->name('plane.airline');


//tourist place
Route::get('tourist-place', [App\Http\Controllers\Frontend\TouristPlaceController::class, 'index'])->name('place.index');
Route::get('tourist-place/result', [App\Http\Controllers\Frontend\TouristPlaceController::class, 'search'])->name('place.search');


//shop
Route::get('shop', [App\Http\Controllers\Frontend\ShopController::class, 'index'])->name('shop.index');
Route::get('shop/result', [App\Http\Controllers\Frontend\ShopController::class, 'search'])->name('shop.search');

//story
Route::get('story', [App\Http\Controllers\Frontend\StoryController::class, 'index'])->name('story.index');
Route::get('story/{slug}', [App\Http\Controllers\Frontend\StoryController::class, 'show'])->name('story.show');
Route::get('story/category/{slug}', [App\Http\Controllers\Frontend\StoryController::class, 'category'])->name('story.category');

//namaz
Route::get('namaz-time', [App\Http\Controllers\Frontend\NamazController::class, 'index'])->name('namaz.index');


//coourse
Route::get('course', [App\Http\Controllers\Frontend\CourseController::class, 'index'])->name('course.index');
Route::get('course/{slug}', [App\Http\Controllers\Frontend\CourseController::class, 'show'])->name('course.show');
Route::get('course-apply/{id}', [App\Http\Controllers\Frontend\CourseController::class, 'applyForm'])->name('course.apply.form');
Route::post('course-apply', [App\Http\Controllers\Frontend\CourseController::class, 'apply'])->name('course.apply.submit');

//Volunteer
Route::get('volunteer', [App\Http\Controllers\Frontend\VolunteerController::class, 'index'])->name('volunteer.index');
Route::get('volunteer/apply', [App\Http\Controllers\Frontend\VolunteerController::class, 'create'])->name('volunteer.create');
Route::get('volunteer/result', [App\Http\Controllers\Frontend\VolunteerController::class, 'search'])->name('volunteer.search');

//contact us
Route::get('contact-us', [App\Http\Controllers\Frontend\PageController::class, 'contact'])->name('contact.index');

//about us
Route::get('about-us', [App\Http\Controllers\Frontend\PageController::class, 'about'])->name('about.index');

//terms and conditions
Route::get('terms-conditions', [App\Http\Controllers\Frontend\PageController::class, 'terms'])->name('terms.index');

//Privacy Policy
Route::get('privacy-policy', [App\Http\Controllers\Frontend\PageController::class, 'privacy'])->name('privacy.index');

//help
Route::get('help', [App\Http\Controllers\Frontend\PageController::class, 'help'])->name('help.index');

//about khulna
Route::get('about-khulna', [App\Http\Controllers\Frontend\PageController::class, 'aboutKhulna'])->name('khulna.index');







// filter
Route::get('get-city/{id}', [App\Http\Controllers\Frontend\FilterController::class, 'getCity']);
Route::get('get-city-option/{id}', [App\Http\Controllers\Frontend\FilterController::class, 'getCitySelect']);



//admin
Route::prefix('admin')->group(function () {

	Auth::routes();

	Route::get('', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

	// newspaper
	Route::resource('newspaper-category', App\Http\Controllers\Backend\NewspaperCategoryController::class, ['names' => 'admin.newspaper-category']);
	Route::resource('newspaper', App\Http\Controllers\Backend\NewspaperController::class, ['names' => 'admin.newspaper']);

	//address
	//district
	Route::resource('district', App\Http\Controllers\Backend\DistrictController::class, ['names' => 'admin.district']);

	// division
	Route::resource('division', App\Http\Controllers\Backend\DivisionController::class, ['names' => 'admin.division']);

	//city
	Route::resource('city', App\Http\Controllers\Backend\CityController::class, ['names' => 'admin.city']);

	//blood
	Route::resource('blood', App\Http\Controllers\Backend\BloodController::class, ['names' => 'admin.blood']);

	Route::resource('blood-donor', App\Http\Controllers\Backend\BloodDonorController::class, ['names' => 'admin.blood-donor']);

	//newspaper
	Route::resource('hospital-category', App\Http\Controllers\Backend\HospitalCategoryController::class, ['names' => 'admin.hospital-category']);
	Route::resource('hospital', App\Http\Controllers\Backend\HospitalController::class, ['names' => 'admin.hospital']);

	//ambulance
	Route::resource('ambulance', App\Http\Controllers\Backend\AmbulanceController::class, ['names' => 'admin.ambulance']);

	//food
	Route::resource('food', App\Http\Controllers\Backend\FoodController::class, ['names' => 'admin.food']);

	Route::resource('restaurant', App\Http\Controllers\Backend\RestaurantController::class, ['names' => 'admin.restaurant']);

	//fire servive
	Route::resource('fire-service', App\Http\Controllers\Backend\FireServiceController::class, ['names' => 'admin.fireservice']);
	
	//journalist
	Route::resource('journalist-category', App\Http\Controllers\Backend\JournalistCategoryController::class, ['names' => 'admin.journalist-category']);
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

	//pdf
	Route::resource('pdf', App\Http\Controllers\Backend\PdfController::class, ['names' => 'admin.pdf']);

	// educational institute
	Route::resource('educational-institute-category', App\Http\Controllers\Backend\EducationCategoryController::class, ['names' => 'admin.educationalinstitute-category']);
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
	Route::resource('thana-category', App\Http\Controllers\Backend\ThanaCategoryController::class, ['names' => 'admin.thana-category']);
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


	// country
	Route::resource('country', App\Http\Controllers\Backend\CountryController::class, ['names' => 'admin.country']);


	// airline
	Route::resource('airline', App\Http\Controllers\Backend\AirlineController::class, ['names' => 'admin.airline']);

	// plane ticket counter
	Route::resource('plane-ticket-counter', App\Http\Controllers\Backend\PlaneCounterController::class, ['names' => 'admin.plane-counter']);

	// plane route
	Route::resource('plane-route', App\Http\Controllers\Backend\PlaneRouteController::class, ['names' => 'admin.plane-route']);

	// plane ticket
	Route::resource('plane-ticket', App\Http\Controllers\Backend\PlaneTicketController::class, ['names' => 'admin.plane-ticket']);


	// volunteer
	Route::resource('volunteer', App\Http\Controllers\Backend\VolunteerController::class, ['names' => 'admin.volunteer']);


	// course category
	Route::resource('course-category', App\Http\Controllers\Backend\CourseCategoryController::class, ['names' => 'admin.course-category']);

	// course
	Route::resource('course', App\Http\Controllers\Backend\CourseController::class, ['names' => 'admin.course']);
	
	
	//namaz
	Route::resource('namaz', App\Http\Controllers\Backend\NamazController::class, ['names' => 'admin.namaz']);

	
	
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

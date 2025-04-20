<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [\App\Http\Controllers\ApiController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('count-newspapers', [App\Http\Controllers\ApiController::class, 'countNewspaper']);

    Route::get('newspapers', [App\Http\Controllers\ApiController::class, 'newspaper']);
    Route::get('newspapers/{id}', [App\Http\Controllers\ApiController::class, 'newspaperByID']);


    Route::get('blood-donors', [App\Http\Controllers\ApiController::class, 'bloodDonor']);
    Route::get('hospitals', [App\Http\Controllers\ApiController::class, 'hospital']);
    Route::get('ambulances', [App\Http\Controllers\ApiController::class, 'ambulance']);

    // doctor
    Route::get('doctors', [App\Http\Controllers\ApiController::class, 'doctor']);
    Route::get('doctors/{id}', [App\Http\Controllers\ApiController::class, 'singleDoctor']);

    // bus tikets
    Route::get('bus-routes', [App\Http\Controllers\ApiController::class, 'busRoutes']);
    Route::get('bus-routes/{id}', [App\Http\Controllers\ApiController::class, 'busRoutesById']);

    // bus
    Route::get('buses', [App\Http\Controllers\ApiController::class, 'buses']);

    // train routes
    Route::get('train-routes', [App\Http\Controllers\ApiController::class, 'trainRoutes']);
    Route::get('trains', [App\Http\Controllers\ApiController::class, 'trains']);

    // foods
    Route::get('foods', [App\Http\Controllers\ApiController::class, 'foods']);
    Route::get('restaurants', [App\Http\Controllers\ApiController::class, 'restaurants']);

    // plane tickts
    Route::get('plane-tickets', [App\Http\Controllers\ApiController::class, 'planeTickets']);

    // police station
    Route::get('police-station', [App\Http\Controllers\ApiController::class, 'policeStation']);
    Route::get('police-station/police/{id}', [App\Http\Controllers\ApiController::class, 'police']);

    // journalists
    Route::get('journalists', [App\Http\Controllers\ApiController::class, 'journalists']);


    // lawyers
    Route::get('lawyers', [App\Http\Controllers\ApiController::class, 'lawyers']);

    // fireservices
    Route::get('fireservices', [App\Http\Controllers\ApiController::class, 'fireservices']);

    // electricity
    Route::get('electricity', [App\Http\Controllers\ApiController::class, 'electricity']);


    // hotels
    Route::get('hotels', [App\Http\Controllers\ApiController::class, 'hotels']);

    //e-help
    Route::get('ehelp', [App\Http\Controllers\ApiController::class, 'ehelp']);


    //trainingcenters
    Route::get('trainingcenters', [App\Http\Controllers\ApiController::class, 'trainingcenters']);

    //govtoffices
    Route::get('govtoffices', [App\Http\Controllers\ApiController::class, 'govtoffices']);

    //jobs
    Route::get('jobs', [App\Http\Controllers\ApiController::class, 'jobs']);

    //helplines
    Route::get('helplines', [App\Http\Controllers\ApiController::class, 'helplines']);

    //educationalInstitutes
    Route::get('educational-institutes', [App\Http\Controllers\ApiController::class, 'educationalInstitutes']);

    //libraries
    Route::get('libraries', [App\Http\Controllers\ApiController::class, 'libraries']);

    //business ideas
    Route::get('business-ideas', [App\Http\Controllers\ApiController::class, 'businessIdeas']);
    Route::get('business-idea/{id}', [App\Http\Controllers\ApiController::class, 'businessIdeaById']);

    //tourist places
    Route::get('tourist-places', [App\Http\Controllers\ApiController::class, 'touristPlaces']);

    //shop categories
    Route::get('shop-categories', [App\Http\Controllers\ApiController::class, 'shopCategory']);

    //shops
    Route::get('shops', [App\Http\Controllers\ApiController::class, 'shops']);

    //stories
    Route::get('stories', [App\Http\Controllers\ApiController::class, 'stories']);
    Route::get('story/{id}', [App\Http\Controllers\ApiController::class, 'storyById']);

    //namaz
    Route::get('namaz', [App\Http\Controllers\ApiController::class, 'namaz']);

    // 
    Route::get('blogs', [App\Http\Controllers\ApiController::class, 'blogs']);
    Route::get('blog/{id}', [App\Http\Controllers\ApiController::class, 'blogById']);
});

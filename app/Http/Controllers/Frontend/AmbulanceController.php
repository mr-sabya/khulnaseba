<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\Ambulance;
use App\Models\District;

class AmbulanceController extends Controller
{
    public function index()
    {
    	$ambulances = Ambulance::orderBy('name', 'ASC')->get();

    	$districts = District::orderBy('name', 'ASC')->get();

    	return view('frontend.ambulance.index', compact('ambulances', 'districts'));
    }
}

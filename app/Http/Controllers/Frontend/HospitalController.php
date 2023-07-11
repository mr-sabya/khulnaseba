<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\Hospital;
use App\Models\District;

class HospitalController extends Controller
{
    public function index()
    {
    	$hospitals = Hospital::orderBy('name', 'ASC')->get();
    	$districts = District::orderBy('name', 'ASC')->get();

    	return view('frontend.hospital.index', compact('hospitals', 'districts'));
    }
}
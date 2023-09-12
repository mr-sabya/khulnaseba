<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BloodDonor;
use App\Models\District;
use App\Models\Blood;

class BloodDonorController extends Controller
{
    public function index()
    {
    	$donors = BloodDonor::orderBy('id', 'DESC')->paginate(12);
    	$districts = District::orderBy('name', 'ASC')->get();
    	$bloods = Blood::all();

    	return view('frontend.blood.index', compact('donors', 'districts', 'bloods'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Fireservice;
use Illuminate\Http\Request;

class FireServiceController extends Controller
{
    public function index()
    {
        $fireservices = Fireservice::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();
        
        return view('frontend/fireservice/index', compact('fireservices', 'districts'));
    }
}

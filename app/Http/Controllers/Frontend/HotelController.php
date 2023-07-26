<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::orderBy('name', 'ASC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();
        
        return view('frontend.hotel.index', compact('hotels', 'districts'));
    }
}

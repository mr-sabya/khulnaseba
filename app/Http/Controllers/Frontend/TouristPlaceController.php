<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TouristPlace;
use Illuminate\Http\Request;

class TouristPlaceController extends Controller
{
    public function index()
    {
        $places = TouristPlace::orderBy('id', 'DESC')->paginate(16);
        return view('frontend.place.index', compact('places'));
    }
}

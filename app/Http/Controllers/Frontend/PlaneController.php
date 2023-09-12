<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Airline;
use App\Models\District;
use App\Models\PlaneTicket;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    public function index()
    {
        $tickes = PlaneTicket::orderBy('id', 'DESC')->paginate(15);
        return view('frontend.plane.index', compact('tickets'));    
    }


    public function airline($slug)
    {
        $airline = Airline::where('slug', $slug)->first();
        $airlines = Airline::orderBy('id', 'DESC')->get();
        return view('frontend.plane.airline', compact('airline', 'airlines'));
    }
}

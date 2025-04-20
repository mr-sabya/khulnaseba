<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Airline;
use App\Models\District;
use App\Models\PlaneRoute;
use App\Models\PlaneTicket;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    public function index()
    {
        $tickets = PlaneTicket::orderBy('id', 'DESC')->paginate(15);
        $routes = PlaneRoute::all();
        return view('frontend.plane.index', compact('tickets', 'routes'));    
    }


    public function search(Request $request)
    {
        $tickets = PlaneTicket::where('route_id', $request->route_id)
        ->orderBy('id', 'DESC')->paginate(15);

        return view('frontend.plane.result', compact('tickets'));    
    }


    public function airline($slug)
    {
        $airline = Airline::where('slug', $slug)->first();
        $airlines = Airline::orderBy('id', 'DESC')->get();
        return view('frontend.plane.airline', compact('airline', 'airlines'));
    }
}

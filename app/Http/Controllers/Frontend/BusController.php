<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\BusTicket;
use App\Models\BusType;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $routes = BusRoute::orderBy('name', 'ASC')->get();
        $buses = Bus::orderBy('name', 'ASC')->get();

        return view('frontend.bus.index', compact('routes', 'buses'));
    }


    public function search(Request $request)
    {
        $route = BusRoute::where('id', $request->route_id)->first();
        $bus = Bus::where('id', $request->bus_id)->first();

        $tickets = BusTicket::where('route_id', $route->id)
        ->where('bus_id', $bus->id)
        ->get();

        return view('frontend.bus.result', compact('route', 'bus', 'tickets'));
    }
}

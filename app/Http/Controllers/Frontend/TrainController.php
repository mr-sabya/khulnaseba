<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Train;
use App\Models\TrainClass;
use App\Models\TrainRoute;
use App\Models\TrainTicket;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        $routes = TrainRoute::orderBy('name', 'ASC')->get();
        $trains = Train::orderBy('name', 'ASC')->get();
        $train_classes = TrainClass::orderBy('name', 'ASC')->get();

        return view('frontend.train.index', compact('routes', 'trains', 'train_classes'));
    }

    public function search(Request $request)
    {
        $route = TrainRoute::where('id', $request->route_id)->first();
        $train_class = TrainClass::where('id', $request->class_id)->first();

        $tickets = TrainTicket::where('route_id', $route->id)
        ->where('class_id', $train_class->id)
        ->get();

        return view('frontend.train.result', compact('route', 'train_class', 'tickets'));
    }
}

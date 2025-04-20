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

        return view('frontend.fireservice.index', compact('fireservices', 'districts'));
    }

    public function search(Request $request)
    {
        if ($request->district_id && $request->city_id) {
            $fireservices = Fireservice::where('district_id', $request->district_id)
                ->where('city_id', $request->city_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id) {
            $fireservices = Fireservice::where('district_id', $request->district_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->city_id) {
            $fireservices = Fireservice::where('city_id', $request->city_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else {
            $fireservices = Fireservice::orderBy('id', 'DESC')->paginate(12);
        }

        return view('frontend.fireservice.result', compact('fireservices'));
    }
}

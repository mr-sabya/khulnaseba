<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\PlaceType;
use App\Models\TouristPlace;
use Illuminate\Http\Request;

class TouristPlaceController extends Controller
{
    public function index()
    {
        $places = TouristPlace::orderBy('id', 'DESC')->paginate(16);
        $districts = District::orderBy('name', 'ASC')->get();
        $categories = PlaceType::all();
        return view('frontend.place.index', compact('places', 'districts', 'categories'));
    }

    public function search(Request $request)
    {
        if ($request->district_id && $request->type_id && $request->search) {
            $places = TouristPlace::where('district_id', $request->district_id)
                ->where('type_id', $request->type_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')->paginate(16);
        } else if ($request->district_id && $request->type_id) {
            $places = TouristPlace::where('district_id', $request->district_id)
                ->where('type_id', $request->type_id)
                ->orderBy('id', 'DESC')->paginate(16);
        } else if ($request->type_id && $request->search) {
            $places = TouristPlace::where('type_id', $request->type_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')->paginate(16);
        } else if ($request->district_id) {
            $places = TouristPlace::where('district_id', $request->district_id)
                ->orderBy('id', 'DESC')->paginate(16);
        } else if ($request->type_id) {
            $places = TouristPlace::where('type_id', $request->type_id)
                ->orderBy('id', 'DESC')->paginate(16);
        } else if ($request->search) {
            $places = TouristPlace::where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')->paginate(16);
        }else{
            $places = TouristPlace::orderBy('id', 'DESC')->paginate(16);
        }

        return view('frontend.place.result', compact('places'));
    }
}

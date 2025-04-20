<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\Hospital;
use App\Models\District;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.hospital.index', compact('hospitals', 'districts'));
    }

    public function search(Request $request)
    {
        if ($request->district_id && $request->city_id && $request->search) {
            $hospitals = Hospital::where('city_id', $request->city_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->city_id) {
            $hospitals = Hospital::where('city_id', $request->city_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->search) {
            $hospitals = Hospital::where('district_id', $request->district_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->search) {
            $hospitals = Hospital::where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id) {
            $hospitals = Hospital::where('district_id', $request->district_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else {
            $hospitals = Hospital::orderBy('id', 'DESC')->paginate(12);
        }

        return view('frontend.hospital.result', compact('hospitals'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\PalliBidyut;
use Illuminate\Http\Request;

class ElectricityController extends Controller
{

    public function index()
    {
        $electricities = PalliBidyut::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.electricity.index', compact('electricities', 'districts'));
    }

    public function search(Request $request)
    {
        if ($request->district_id && $request->city_id && $request->search) {
            $electricities = PalliBidyut::where('city_id', $request->city_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->city_id) {
            $electricities = PalliBidyut::where('city_id', $request->city_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->search) {
            $electricities = PalliBidyut::where('district_id', $request->district_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->search) {
            $electricities = PalliBidyut::where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id) {
            $electricities = PalliBidyut::where('district_id', $request->district_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else {
            $electricities = PalliBidyut::orderBy('id', 'DESC')->paginate(12);
        }

        return view('frontend.electricity.result', compact('electricities'));
    }
}

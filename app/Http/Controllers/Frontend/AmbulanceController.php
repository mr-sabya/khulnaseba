<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\Ambulance;
use App\Models\District;

class AmbulanceController extends Controller
{
    public function index()
    {
    	$ambulances = Ambulance::orderBy('id', 'DESC')->paginate(12);
    	$districts = District::orderBy('name', 'ASC')->get();

    	return view('frontend.ambulance.index', compact('ambulances', 'districts'));
    }


    public function search(Request $request)
    {
        if($request->district_id && $request->city_id && $request->search){
            $ambulances = Ambulance::where('city_id', $request->city_id)
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id && $request->city_id){
            $ambulances = Ambulance::where('city_id', $request->city_id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id && $request->search){
            $ambulances = Ambulance::where('district_id', $request->district_id)
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->search){
            $ambulances = Ambulance::where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id){
            $ambulances = Ambulance::where('district_id', $request->district_id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else{
            $ambulances = Ambulance::orderBy('id', 'DESC')->paginate(12);
        }

    	return view('frontend.ambulance.result', compact('ambulances'));
    }
}

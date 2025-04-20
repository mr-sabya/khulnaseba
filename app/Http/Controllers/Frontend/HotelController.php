<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\District;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();
        
        return view('frontend.hotel.index', compact('hotels', 'districts'));
    }

    public function search(Request $request)
    {
        if($request->district_id && $request->city_id && $request->search){
            $hotels = Hotel::where('city_id', $request->city_id)
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id && $request->city_id){
            $hotels = Hotel::where('city_id', $request->city_id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id && $request->search){
            $hotels = Hotel::where('district_id', $request->district_id)
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->search){
            $hotels = Hotel::where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id){
            $hotels = Hotel::where('district_id', $request->district_id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else{
            $hotels = Hotel::orderBy('id', 'DESC')->paginate(12);
        }

    	return view('frontend.hotel.result', compact('hotels'));
    }
}

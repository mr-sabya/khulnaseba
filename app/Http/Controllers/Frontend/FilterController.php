<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BusRoute;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function getCity($id)
    {
        $cities = City::where('district_id', $id)->get();

        $data = "";

        if($cities->count() > 0){
            foreach ($cities as $city) {
                $data .= '<div class="col-lg-4 mb-2"> <a href="javascript:void(0)" class="city" data-id="' . $city->id . '" data-value="' . $city->name . '"><i class="fa-solid fa-location-dot"></i> ' . $city->name . '</a></div>';
            }
        }else{
            $data .= '<div class="col-lg-12 text-center"> No City Found!</div>';
        }
        

        return response()->json([
            'data' => $data,
        ]);
    }


    public function getCitySelect($id)
    {
        $cities = City::where('district_id', $id)->get();
        $district = District::where('id', $id)->first();

        $data = "";

        if($cities->count() > 0){
            $data .= '<option value="">All ' . $district->name . '</option>';
            foreach ($cities as $city) {
                $data .= '<option value="' . $city->id . '">' . $city->name . '</option>';
            }
        }else{
            $data .= '<option value="" selected disabled>No City Found</option>';
        }
        

        return response()->json([
            'data' => $data,
        ]);
    }

    public function getBus($id)
    {
        $busroute = BusRoute::with('buses')->where('id', $id)->first();
        $buses = $busroute->buses;

        // return $buses;
        $data = "";

        if ($buses->count() > 0) {
            foreach ($buses as $bus) {
                $data .= '<option value="' . $bus->id . '">' . $bus->name . '</option>';
            }
        }

        return response()->json([
            'data' => $data,
        ]);
    }
}

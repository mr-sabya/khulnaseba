<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function getCity($id)
    {
        $cities = City::where('district_id', $id)->get();

        $data = "";

        foreach($cities as $city){
            $data .= '<div class="col-lg-3"><a href="javascript:void(0)" class="city" data-id="'. $city->id .'" data-value="'. $city->name .'">'. $city->name .'</a></div>';
        }

        return response()->json([
            'data' => $data,
        ]);
    }
}

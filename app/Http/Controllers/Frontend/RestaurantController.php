<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::orderBy('name', 'ASC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();
        $foods = Food::orderBy('name', 'ASC')->get();
        
        return view('frontend.restaurant.index', compact('restaurants', 'districts', 'foods'));
    }
}

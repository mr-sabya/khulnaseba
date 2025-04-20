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
		$restaurants = Restaurant::orderBy('id', 'DESC')->paginate(12);
		$districts = District::orderBy('name', 'ASC')->get();
		$foods = Food::orderBy('name', 'ASC')->get();

		return view('frontend.restaurant.index', compact('restaurants', 'districts', 'foods'));
	}


	public function show($slug)
	{
		$food = Food::where('slug', $slug)->first();
		return view('frontend.restaurant.show', compact('food'));
	}


	public function search(Request $request)
	{

		// return $request;
		if ($request->district_id && $request->city_id && $request->food_id && $request->search) {
			$food = Food::where('id', $request->food_id)->first();

			$restaurants = $food->restaurants()
				->where('city_id', $request->city_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->district_id && $request->city_id && $request->food_id) {

			$food = Food::where('id', $request->food_id)->first();
			$restaurants = $food->restaurants()->where('city_id', $request->city_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->district_id && $request->city_id && $request->search) {
			$restaurants = Restaurant::where('city_id', $request->city_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->district_id && $request->food_id) {
			$food = Food::where('id', $request->food_id)->first();
			$restaurants = $food->restaurants()->where('district_id', $request->district_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->district_id && $request->search) {
			$restaurants = Restaurant::where('district_id', $request->district_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->district_id && $request->city_id) {
			$restaurants = Restaurant::where('city_id', $request->city_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id && $request->food_id && $request->search) {
			$food = Food::where('id', $request->food_id)->first();
			$restaurants = $food->restaurants()->where('city_id', $request->city_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id && $request->search) {
			$restaurants = Restaurant::where('city_id', $request->city_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id && $request->food_id) {
			$food = Food::where('id', $request->food_id)->first();
			$restaurants = $food->restaurants()->where('city_id', $request->city_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->district_id) {
			$restaurants = Restaurant::where('district_id', $request->district_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id) {
			$restaurants = Restaurant::where('city_id', $request->city_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->food_id) {
			$food = Food::where('id', $request->food_id)->first();
			$restaurants = $food->restaurants()->orderBy('id', 'DESC')->paginate(12);
		} else if ($request->search) {
			$restaurants = Restaurant::where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else {
			$restaurants = Restaurant::orderBy('id', 'DESC')->paginate(12);
		}


		return view('frontend.restaurant.result', compact('restaurants'));
	}
}

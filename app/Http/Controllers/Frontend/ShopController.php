<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Shop;
use App\Models\ShopCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::orderBy('id', 'DESC')->paginate(15);
        $districts = District::orderBy('name', 'ASC')->get();
        $categories = ShopCategory::orderBy('name', 'ASC')->get();
        
        return view('frontend.shop.index', compact('shops', 'districts', 'categories'));
    }


    public function search(Request $request)
	{
		if ($request->city_id && $request->category_id && $request->search) {
			$shops = Shop::where('city_id', $request->city_id)
				->where('category_id', $request->category_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id && $request->category_id) {
			$shops = Shop::where('city_id', $request->city_id)
				->where('category_id', $request->category_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->category_id && $request->search) {
			$shops = Shop::where('category_id', $request->category_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		}else if ($request->city_id) {
			$donors = Shop::where('city_id', $request->city_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->search) {
			$shops = Shop::where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->category_id) {
			$shops = Shop::where('category_id', $request->category_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else {
			$shops = Shop::orderBy('id', 'DESC')->paginate(12);
		}


		return view('frontend.shop.result', compact('shops'));
	}
}

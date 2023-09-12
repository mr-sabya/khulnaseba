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
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\Newspaper;
use App\Models\NewspaperCategory;

class NewspaperController extends Controller
{
    //list
    public function index()
    {
    	$newspapers = Newspaper::orderBy('id', 'DESC')->get();
        $categories = NewspaperCategory::all();
    	return view('frontend.newspaper.index', compact('newspapers', 'categories'));
    }

    //show
    public function show($slug)
    {
    	$newspaper = Newspaper::where('slug', $slug)->firstOrFail();
    	return view('frontend.newspaper.show', compact('newspaper'));
    }
}

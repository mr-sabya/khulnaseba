<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\Newspaper;

class NewspaperController extends Controller
{
    //list
    public function index()
    {
    	$newspapers = Newspaper::orderBy('name', 'ASC')->get();
    	return view('frontend.newspaper.index', compact('newspapers'));
    }

    //show
    public function show($slug)
    {
    	$newspaper = Newspaper::where('slug', $slug)->firstOrFail();
    	return view('frontend.newspaper.show', compact('newspaper'));
    }
}

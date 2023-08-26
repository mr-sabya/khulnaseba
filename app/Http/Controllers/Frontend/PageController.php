<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function livetv()
    {
        return view('frontend.livetv.index');
    }


    // contact us
    public function contact()
    {
        return view('frontend.contact.index');
    }


    //about page
    public function about()
    {
        return view('frontend.about.index');
    }
}

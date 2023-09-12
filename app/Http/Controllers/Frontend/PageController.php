<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
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
        $setting = Setting::findOrFail(intval(1));
        return view('frontend.contact.index', compact('setting'));
    }


    //about page
    public function about()
    {
        $setting = Setting::findOrFail(intval(1));
        return view('frontend.about.index', compact('setting'));
    }


    //terms and condition page
    public function terms()
    {
        $setting = Setting::findOrFail(intval(1));
        return view('frontend.pages.terms', compact('setting'));
    }

    //privacy pocily page
    public function privacy()
    {
        $setting = Setting::findOrFail(intval(1));
        return view('frontend.pages.privacy', compact('setting'));
    }

    //help
    public function help()
    {
        $setting = Setting::findOrFail(intval(1));
        return view('frontend.pages.help', compact('setting'));
    }


    //about khulna
    public function aboutkhulna()
    {
        $setting = Setting::findOrFail(intval(1));
        return view('frontend.pages.khulna', compact('setting'));
    }
}

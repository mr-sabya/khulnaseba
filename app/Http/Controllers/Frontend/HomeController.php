<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{

    public function index()
    {
        $ip = request()->ip();
        $location = Location::get($ip); 
        $blogs = Blog::orderBy('id', 'DESC')->take(4)->get();

        $setting = Setting::findOrFail(intval(1));
        $feedbacks = Testimonial::orderBy('id')->get();

        $banners = Banner::orderBy('id', 'DESC')->take(2)->get();

        return view('frontend.home.index', compact('blogs', 'location', 'setting', 'feedbacks', 'banners'));
    }

    public function theme()
    {
        if (session()->get('theme')) {
            Session::flush();
            return response()->json(["remove" => "ok"]);
        }else{
            session()->put('theme', 'dark');
            return response()->json(["added" => "ok"]);
        }
        

        
    }
}

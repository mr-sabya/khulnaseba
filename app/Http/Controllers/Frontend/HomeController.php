<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class HomeController extends Controller
{

    public function index()
    {
        
        return view('frontend.home.index');
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

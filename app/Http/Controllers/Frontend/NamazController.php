<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Namaz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class NamazController extends Controller
{
    public function index()
    {
        $ip = request()->ip();
        $location = Location::get($ip); 
        

        $namaz = Namaz::where('date', Carbon::now()->format('Y-m-d'))->first();
        // return $namaz;
        return view('frontend.namaz.index', compact('namaz'));    
    }
}

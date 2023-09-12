<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ehelp;
use Illuminate\Http\Request;

class EhelpController extends Controller
{
    //list
    public function index()
    {
    	$ehelps = Ehelp::orderBy('id', 'DESC')->get();
    	return view('frontend.ehelp.index', compact('ehelps'));
    }

    //show
    public function show($id)
    {
    	$ehelp = Ehelp::where('id', $id)->firstOrFail();
    	return view('frontend.ehelp.show', compact('ehelp'));
    }
}

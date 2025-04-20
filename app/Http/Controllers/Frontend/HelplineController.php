<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Helpline;
use Illuminate\Http\Request;

class HelplineController extends Controller
{
    //list
    public function index()
    {
    	$helplines = Helpline::orderBy('id', 'DESC')->get();
    	return view('frontend.helpline.index', compact('helplines'));
    }
}

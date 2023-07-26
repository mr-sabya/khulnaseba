<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Journalist;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    public function index()
    {
        $journalists = Journalist::orderBy('name', 'ASC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.journalist.index', compact('journalists', 'districts'));
    }
}

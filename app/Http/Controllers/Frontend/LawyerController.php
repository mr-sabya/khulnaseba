<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    public function index()
    {
        $lawyers = Lawyer::orderBy('name', 'ASC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.lawyer.index', compact('lawyers', 'districts'));
    }
}

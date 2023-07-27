<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\GovtOffice;
use Illuminate\Http\Request;

class GovtOfficeController extends Controller
{
    public function index()
    {
        $govt_offices = GovtOffice::orderBy('name', 'ASC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.govt-office.index', compact('govt_offices', 'districts'));
    }
}

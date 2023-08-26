<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\EducationalInstitute;
use Illuminate\Http\Request;

class EduInstituteController extends Controller
{
    public function index()
    {
        $schools = EducationalInstitute::orderBy('name', 'ASC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.school.index', compact('schools', 'districts'));
    }
}

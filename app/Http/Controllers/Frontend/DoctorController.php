<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorType;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();
        $types = DoctorType::orderBy('name', 'ASC')->get();

        return view('frontend.doctor.index', compact('doctors', 'districts', 'types'));   
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail(intval($id));
        $doctors = Doctor::where('type_id', $doctor->type_id)->take(6)->get();
        return view('frontend.doctor.show', compact('doctor', 'doctors')); 
    }
}

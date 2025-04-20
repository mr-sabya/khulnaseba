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


	public function search(Request $request)
	{
		if ($request->city_id && $request->type_id && $request->search) {
			$doctors = Doctor::where('city_id', $request->city_id)
				->where('type_id', $request->type_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id && $request->type_id) {
			$doctors = Doctor::where('city_id', $request->city_id)
				->where('type_id', $request->type_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->type_id && $request->search) {
			$doctors = Doctor::where('type_id', $request->type_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		}else if ($request->city_id) {
			$donors = Doctor::where('city_id', $request->city_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->search) {
			$doctors = Doctor::where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->type_id) {
			$doctors = Doctor::where('type_id', $request->type_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else {
			$doctors = Doctor::orderBy('id', 'DESC')->paginate(12);
		}


		return view('frontend.doctor.result', compact('doctors'));
	}
}

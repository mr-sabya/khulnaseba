<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\EducationalInstitute;
use App\Models\EducationCategory;
use Illuminate\Http\Request;

class EduInstituteController extends Controller
{
	public function index()
	{
		$schools = EducationalInstitute::orderBy('id', 'DESC')->paginate(12);
		$districts = District::orderBy('name', 'ASC')->get();
		$categories = EducationCategory::all();

		return view('frontend.school.index', compact('schools', 'districts', 'categories'));
	}


	public function search(Request $request)
	{
		if ($request->city_id && $request->category_id && $request->search) {
			$schools = EducationalInstitute::where('city_id', $request->city_id)
				->where('category_id', $request->category_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id && $request->category_id) {
			$schools = EducationalInstitute::where('city_id', $request->city_id)
				->where('category_id', $request->category_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->category_id && $request->search) {
			$schools = EducationalInstitute::where('category_id', $request->category_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->search) {
			$schools = EducationalInstitute::where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->category_id) {
			$schools = EducationalInstitute::where('category_id', $request->category_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else {
			$schools = EducationalInstitute::orderBy('id', 'DESC')->paginate(12);
		}


		return view('frontend.school.result', compact('schools'));
	}
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BloodDonor;
use App\Models\District;
use App\Models\Blood;

class BloodDonorController extends Controller
{
	public function index()
	{
		$donors = BloodDonor::orderBy('id', 'DESC')->paginate(12);
		$districts = District::orderBy('name', 'ASC')->get();
		$bloods = Blood::orderBy('name', 'ASC')->get();

		return view('frontend.blood.index', compact('donors', 'districts', 'bloods'));
	}

	public function search(Request $request)
	{
		if ($request->city_id && $request->blood_id && $request->search) {
			$donors = BloodDonor::where('city_id', $request->city_id)
				->where('blood_id', $request->blood_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id && $request->blood_id) {
			$donors = BloodDonor::where('city_id', $request->city_id)
				->where('blood_id', $request->blood_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->blood_id && $request->search) {
			$donors = BloodDonor::where('blood_id', $request->blood_id)
				->where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->city_id) {
			$donors = BloodDonor::where('city_id', $request->city_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->search) {
			$donors = BloodDonor::where('name', 'like', '%' . $request->search . '%')
				->orderBy('id', 'DESC')
				->paginate(12);
		} else if ($request->blood_id) {
			$donors = BloodDonor::where('blood_id', $request->blood_id)
				->orderBy('id', 'DESC')
				->paginate(12);
		} else {
			$donors = BloodDonor::orderBy('id', 'DESC')->paginate(12);
		}


		return view('frontend.blood.result', compact('donors'));
	}
}

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
        $govt_offices = GovtOffice::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.govt-office.index', compact('govt_offices', 'districts'));
    }

    public function search(Request $request)
    {
        if ($request->district_id && $request->city_id && $request->search) {
            $govt_offices = GovtOffice::where('city_id', $request->city_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->city_id) {
            $govt_offices = GovtOffice::where('city_id', $request->city_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->search) {
            $govt_offices = GovtOffice::where('district_id', $request->district_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->search) {
            $govt_offices = GovtOffice::where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id) {
            $govt_offices = GovtOffice::where('district_id', $request->district_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else {
            $govt_offices = GovtOffice::orderBy('id', 'DESC')->paginate(12);
        }

        return view('frontend.govt-office.result', compact('govt_offices'));
    }
}

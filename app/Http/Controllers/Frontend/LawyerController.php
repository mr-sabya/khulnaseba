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
        $lawyers = Lawyer::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.lawyer.index', compact('lawyers', 'districts'));
    }


    public function search(Request $request)
    {
        if ($request->district_id && $request->city_id && $request->search) {
            $lawyers = Lawyer::where('city_id', $request->city_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->city_id) {
            $lawyers = Lawyer::where('city_id', $request->city_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->search) {
            $lawyers = Lawyer::where('district_id', $request->district_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->search) {
            $lawyers = Lawyer::where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id) {
            $lawyers = Lawyer::where('district_id', $request->district_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else {
            $lawyers = Lawyer::orderBy('id', 'DESC')->paginate(12);
        }

        return view('frontend.lawyer.result', compact('lawyers'));
    }
}

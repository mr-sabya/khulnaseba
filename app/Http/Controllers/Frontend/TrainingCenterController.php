<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    public function index()
    {
        $training_centers = TrainingCenter::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.training-center.index', compact('training_centers', 'districts'));
    }


    public function search(Request $request)
    {
        if ($request->district_id && $request->city_id && $request->search) {
            $training_centers = TrainingCenter::where('city_id', $request->city_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->city_id) {
            $training_centers = TrainingCenter::where('city_id', $request->city_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id && $request->search) {
            $training_centers = TrainingCenter::where('district_id', $request->district_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->search) {
            $training_centers = TrainingCenter::where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->district_id) {
            $training_centers = TrainingCenter::where('district_id', $request->district_id)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else {
            $training_centers = TrainingCenter::orderBy('id', 'DESC')->paginate(12);
        }

        return view('frontend.training-center.result', compact('training_centers'));
    }
}

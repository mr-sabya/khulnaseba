<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\City;
use App\Models\District;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::orderBy('id', 'DESC')->where('is_active', 1)->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();
        return view('frontend.volunteer.index', compact('volunteers', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloods = Blood::all();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();
        return view('frontend.volunteer.create', compact('bloods', 'districts', 'cities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:15|unique:volunteers',
            'email' => 'required|max:255|unique:volunteers',
            'n_id' => 'required|max:255|unique:volunteers',
            'address' => 'required|max:255',
            'father_name' => 'required|max:255',
            'mother_name' => 'required|max:255',
            'short_bio' => 'required|max:255',
            'blood_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/volunteer/', $filename);
            $input['image'] = $filename;
        }

        Volunteer::create($input);

        return redirect()->route('volunteer.create')->with('success', 'Your request has been submited successfully');
    }


    public function search(Request $request)
    {
        if ($request->city_id && $request->search) {
            $volunteers = Volunteer::where('city_id', $request->city_id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->where('is_active', 1)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->city_id) {
            $volunteers = Volunteer::where('city_id', $request->city_id)
                ->where('is_active', 1)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else if ($request->search) {
            $volunteers = Volunteer::where('name', 'like', '%' . $request->search . '%')
                ->where('is_active', 1)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        } else {
            $volunteers = Volunteer::where('is_active', 1)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        }

        return view('frontend.volunteer.result', compact('volunteers'));
    }
}

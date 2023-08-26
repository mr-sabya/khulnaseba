<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorType;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Type;
use PhpOption\None;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $doctors = Doctor::with('hospitals')->get();
        if (request()->ajax()) {
            return datatables()->of(Doctor::latest()->get())
                ->addColumn('type', function ($data) {
                    if ($data->type) {
                        return $data->type['name'];
                    }
                })
                ->addColumn('district', function ($data) {
                    if ($data->district) {
                        return $data->district['name'];
                    }
                })
                ->addColumn('city', function ($data) {
                    if ($data->city) {
                        return $data->city['name'];
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.doctor.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.doctor.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('admin.chamber.index', $data->id) . '" class="btn btn-info btn-sm"><i class="fa-solid fa-hospital"></i> Chamber</button>';
                    return $button;
                })
                ->rawColumns(['district', 'city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::OrderBy('name', 'ASC')->get();
        $types = DoctorType::orderBy('name', 'ASC')->get();

        return view('backend.doctor.create', compact('districts', 'cities', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *'name', 'degree', 'designation', 'hospital', 'bmdc_no', 'details', 'image', 'type_id', 'district_id', 'city_id'
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'designation' => 'required|max:255',
            'hospital' => 'required|max:255',
            'bmdc_no' => 'nullable|max:255|unique:doctors',
            'details' => 'required',
            'type_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/doctor/', $filename);
            $input['image'] = $filename;
        }

        $doctor = Doctor::create($input);

        $doctor->hospitals()->sync($request->hospitals);

        return redirect()->route('admin.doctor.index')->with('success', 'New Doctor has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail(intval($id));
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::OrderBy('name', 'ASC')->get();
        $types = DoctorType::orderBy('name', 'ASC')->get();

        return view('backend.doctor.edit', compact('doctor', 'districts', 'cities', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail(intval($id));

        if ($doctor->bmdc_no == $request->bmdc_no) {
            $request->validate([
                'name' => 'required|string|max:255',
                'degree' => 'required|string|max:255',
                'designation' => 'required|max:255',
                'hospital' => 'required|max:255',
                'bmdc_no' => 'nullable|max:255',
                'details' => 'required',
                'type_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'degree' => 'required|string|max:255',
                'designation' => 'required|max:255',
                'hospital' => 'required|max:255',
                'bmdc_no' => 'nullable|max:255|unique:doctors',
                'details' => 'required',
                'type_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        }


        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/doctor/', $filename);
            $input['image'] = $filename;
        }

        $doctor->update($input);
        $doctor->hospitals()->sync($request->hospitals);

        return redirect()->route('admin.doctor.index')->with('success', 'Doctor has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail(intval($id));
        $doctor->delete();

        return redirect()->route('admin.doctor.index')->with('success', 'Doctor has been deleted successfully');
    }
}

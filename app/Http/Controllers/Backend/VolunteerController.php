<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\City;
use App\Models\District;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Volunteer::latest()->get())
                ->addColumn('blood', function ($data) {
                    if ($data->bloodGroup) {
                        return $data->bloodGroup['name'];
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
                ->addColumn('status', function ($data) {
                    if ($data->is_active == 1) {
                        $status = '<span style="color:green">Approved</span>';
                    }else{
                        $status = '<span style="color:red">Pending</span>';
                    }

                    return $status;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.volunteer.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.volunteer.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['district', 'city', 'blood', 'status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.volunteer.index');
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
        return view('backend.volunteer.create', compact('bloods', 'districts', 'cities'));
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
        $input['is_active'] = 1;

        Volunteer::create($input);

        return redirect()->route('admin.volunteer.index')->with('success', 'New Volunteer has been added successfully');
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
        $volunteer = Volunteer::findOrFail(intval($id));
        $bloods = Blood::all();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();
        return view('backend.volunteer.edit', compact('volunteer', 'bloods', 'districts', 'cities'));
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
        $volunteer = Volunteer::findOrFail(intval($id));

        if ($volunteer->n_id == $request->n_id) {
            $request->validate([
                'name' => 'required|string|max:255',
                'n_id' => 'required|max:255',
                'address' => 'required|max:255',
                'father_name' => 'required|max:255',
                'mother_name' => 'required|max:255',
                'short_bio' => 'required|max:255',
                'blood_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'n_id' => 'required|max:255|unique:volunteers',
                'address' => 'required|max:255',
                'father_name' => 'required|max:255',
                'mother_name' => 'required|max:255',
                'short_bio' => 'required|max:255',
                'blood_id' => 'required',
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
            $file->move('images/volunteer/', $filename);
            $input['image'] = $filename;
        }

        $volunteer->update($input);

        return redirect()->route('admin.volunteer.index')->with('success', 'Volunteer has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volunteer = Volunteer::findOrFail(intval($id));
        $volunteer->delete();
        return redirect()->route('admin.volunteer.index')->with('success', 'Volunteer has been deleted successfully');
    }
}

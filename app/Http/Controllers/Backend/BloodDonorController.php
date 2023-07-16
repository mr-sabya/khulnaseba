<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\City;
use App\Models\District;
use App\Models\Blood;
use App\Models\BloodDonor;

class BloodDonorController extends Controller
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
        if(request()->ajax())
        {
            return datatables()->of(BloodDonor::latest()->get())
            ->addColumn('blood', function($data){
                return $data->bloodGroup['name'];
            })
            ->addColumn('district', function($data){
                return $data->district['name'];
            })
            ->addColumn('city', function($data){
                return $data->city['name'];
            })
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.blood-donor.edit', $data->id).'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-route="'.route('admin.blood-donor.destroy', $data->id).'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['district', 'city', 'blood', 'action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('backend.blooddonor.index');
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
        return view('backend.blooddonor.create', compact('bloods', 'districts', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:15|unique:blood_donors',
            'address' => 'required|max:255',
            'blood_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        BloodDonor::create($input);

        return redirect()->route('admin.blood-donor.index')->with('success', 'New Blood Donor has been added successfully');
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
        $bloods = Blood::all();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();
        $donor = BloodDonor::findOrFail(intval($id));

        return view('backend.blooddonor.edit', compact('donor', 'bloods', 'districts', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=0)
    {
        $donor = BloodDonor::findOrFail(intval($id));

        if($donor->phone == $request->phone){
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15',
                'address' => 'required|max:255',
                'blood_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15|unique:blood_donors',
                'address' => 'required|max:255',
                'blood_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }
        

        $input = $request->all();

        $donor->update($input);

        return redirect()->route('admin.blood-donor.index')->with('success', 'Blood Donor has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ambulance;
use App\Models\District;
use App\Models\City;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Ambulance::latest()->get())
            ->addColumn('district', function($data){
                return $data->district['name'];
            })
            ->addColumn('city', function($data){
                return $data->city['name'];
            })
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.ambulance.edit', $data->id).'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-route="'.route('admin.ambulance.destroy', $data->id).'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['district', 'city', 'action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('backend.ambulance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.ambulance.create', compact('districts', 'cities'));
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
            'phone' => 'required|max:15|unique:ambulances',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();
    
        Ambulance::create($input);

        return redirect()->route('admin.ambulance.index')->with('success', 'New Ambulance has been added successfully');
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
        $ambulance = Ambulance::findOrFail(intval($id));

        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.ambulance.edit', compact('ambulance', 'districts', 'cities'));
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
        $ambulance = Ambulance::findOrFail(intval($id));

        if($ambulance->phone == $request->phone){
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15|unique:ambulances',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }
        

        $input = $request->all();

        $ambulance->update($input);

        return redirect()->route('admin.ambulance.index')->with('success', 'Ambulance has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambulance = Ambulance::findOrFail(intval($id));

        $ambulance->delete();

        return redirect()->route('admin.ambulance.index')->with('success', 'Ambulance has been deleted successfully');
    }
}

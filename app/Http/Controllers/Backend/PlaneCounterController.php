<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Airline;
use App\Models\City;
use App\Models\District;
use App\Models\PlaneCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaneCounterController extends Controller
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
        // return PlaneTicket::with('airlines')->get();

        if (request()->ajax()) {
            return datatables()->of(PlaneCounter::latest()->get())
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
                    $button = '<a href="' . route('admin.plane-counter.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.plane-counter.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['district', 'city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.plane.counter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airlines = Airline::orderBy('name', 'ASC')->get();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();
        return view('backend.plane.counter.create', compact('districts', 'cities', 'airlines'));
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
            'phone' => 'required|max:15|unique:plane_counters',
            'address' => 'required|max:255',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        $counter = PlaneCounter::create($input);
        $counter->airlines()->sync($request->airline);

        return redirect()->route('admin.plane-counter.index')->with('success', 'New Plane Ticket Counter has been added successfully');
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
        $counter = PlaneCounter::findOrFail(intval($id));

        $airlines = Airline::orderBy('name', 'ASC')->get();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.plane.counter.edit', compact('counter', 'districts', 'cities', 'airlines'));
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
        $counter = PlaneCounter::findOrFail(intval($id));

        if($counter->phone == $request->phone){
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15',
                'address' => 'required|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15|unique:plane_counters',
                'address' => 'required|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }
        

        $input = $request->all();

        $counter->update($input);
        $counter->airlines()->sync($request->airline);

        return redirect()->route('admin.plane-counter.index')->with('success', 'Plane Ticket Counter has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counter = PlaneCounter::findOrFail(intval($id));
        $counter->delete();

        return redirect()->route('admin.plane-counter.index')->with('success', 'Plane Ticket Counter has been deleted successfully');
    }
}

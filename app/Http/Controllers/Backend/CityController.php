<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\City;
use App\Models\District;

class CityController extends Controller
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
            return datatables()->of(City::latest()->get())
            ->addColumn('district', function($data){
                return $data->district['name'];
            })
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.city.edit', $data->id).'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-route="'.route('admin.city.destroy', $data->id).'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['district', 'action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('backend.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::orderBy('name', 'ASC')->get();
        return view('backend.city.create', compact('districts'));
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
            'name' => 'required|string|max:255|unique:cities',
            'district_id' => 'required',
        ]);

        $input = $request->all();

        City::create($input);

        return redirect()->route('admin.city.index')->with('success', 'New City has been added successfully');
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
        $districts = District::orderBy('name', 'ASC')->get();
        $city = City::findOrFail(intval($id));

        return view('backend.city.edit', compact('city', 'districts'));
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
        $city = City::findOrFail(intval($id));

        if($city->name == $request->name){
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'district_id' => 'required',
            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:cities',
                'district_id' => 'required',
            ]);
        }
        

        $input = $request->all();
        $city->update($input);

        return redirect()->route('admin.city.index')->with('success', 'City has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail(intval($id));
        $city->delete();

        return redirect()->route('admin.city.index')->with('success', 'City has been deleted successfully');
    }
}

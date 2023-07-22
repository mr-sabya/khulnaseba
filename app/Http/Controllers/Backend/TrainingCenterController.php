<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(TrainingCenter::latest()->get())
                ->addColumn('district', function ($data) {
                    return $data->district['name'];
                })
                ->addColumn('city', function ($data) {
                    return $data->city['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.trainingcenter.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-route="' . route('admin.trainingcenter.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    return $button;
                })
                ->rawColumns(['district', 'city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.trainingcenter.index');
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

        return view('backend.trainingcenter.create', compact('districts', 'cities'));
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
            'phone' => 'required|max:15|unique:training_centers',
            'address' => 'required|string|max:255',
            'district_id' => 'required',
            'city_id' => 'required',
            'topic' => 'required',
        ]);

        $input = $request->all();

        TrainingCenter::create($input);

        return redirect()->route('admin.trainingcenter.index')->with('success', 'New Training Center  has been added successfully');
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
        $training_center = TrainingCenter::findOrFail(intval($id));
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.trainingcenter.edit', compact('training_center', 'districts', 'cities'));
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
        $training_center = TrainingCenter::findOrFail(intval($id));

        if ($training_center->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15',
                'address' => 'required|string|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
                'topic' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15|unique:training_centers',
                'address' => 'required|string|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
                'topic' => 'required',
            ]);
        }

        $input = $request->all();

        $training_center->update($input);

        return redirect()->route('admin.trainingcenter.index')->with('success', 'Training Center has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training_center = TrainingCenter::findOrFail(intval($id));
        $training_center->delete();
        return redirect()->route('admin.trainingcenter.index')->with('success', 'Training Center has been deleted successfully');
    }
}

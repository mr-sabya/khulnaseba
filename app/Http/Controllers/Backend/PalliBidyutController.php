<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\PalliBidyut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PalliBidyutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(PalliBidyut::latest()->get())
                ->addColumn('district', function ($data) {
                    return $data->district['name'];
                })
                ->addColumn('city', function ($data) {
                    return $data->city['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.pallibidyut.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.pallibidyut.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['district', 'city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.pallibidyut.index');
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

        return view('backend.pallibidyut.create', compact('districts', 'cities'));
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
            'phone' => 'required|max:15|unique:palli_bidyuts',
            'address' => 'required|string|max:255',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        PalliBidyut::create($input);

        return redirect()->route('admin.pallibidyut.index')->with('success', 'New Palli Bidyut  has been added successfully');
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
        $pallibidyut = PalliBidyut::findOrFail(intval($id));
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.pallibidyut.edit', compact('pallibidyut', 'districts', 'cities'));
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
        $pallibidyut = PalliBidyut::findOrFail(intval($id));

        if ($pallibidyut->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15',
                'address' => 'required|string|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15|unique:palli_bidyuts',
                'address' => 'required|string|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }

        $input = $request->all();

        $pallibidyut->update($input);

        return redirect()->route('admin.pallibidyut.index')->with('success', 'Palli Bidyut has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pallibidyut = PalliBidyut::findOrFail(intval($id));
        $pallibidyut->delete();
        return redirect()->route('admin.pallibidyut.index')->with('success', 'Palli Bidyut has been deleted successfully');
    }
}

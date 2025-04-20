<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\EducationalInstitute;
use App\Models\EducationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationalInstituteController extends Controller
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
            return datatables()->of(EducationalInstitute::latest()->get())
                ->addColumn('category', function ($data) {
                    if ($data->category) {
                        return $data->category['name'];
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
                    $button = '<a href="' . route('admin.educationalinstitute.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.educationalinstitute.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['district', 'city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.educationalinstitute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EducationCategory::all();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.educationalinstitute.create', compact('categories', 'districts', 'cities'));
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
            'phone' => 'required|max:15|unique:educational_institutes',
            'address' => 'required|string|max:255',
            'category_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        EducationalInstitute::create($input);

        return redirect()->route('admin.educationalinstitute.index')->with('success', 'New Educational Institute  has been added successfully');
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
        $categories = EducationCategory::all();
        $educationalinstitute = EducationalInstitute::findOrFail(intval($id));
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.educationalinstitute.edit', compact('educationalinstitute', 'categories', 'districts', 'cities'));
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
        $educationalinstitute = EducationalInstitute::findOrFail(intval($id));

        if ($educationalinstitute->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15',
                'address' => 'required|string|max:255',
                'category_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15|unique:educational_institutes',
                'address' => 'required|string|max:255',
                'category_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }

        $input = $request->all();

        $educationalinstitute->update($input);

        return redirect()->route('admin.educationalinstitute.index')->with('success', 'Educational Institute has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educationalinstitute = EducationalInstitute::findOrFail(intval($id));
        $educationalinstitute->delete();
        return redirect()->route('admin.educationalinstitute.index')->with('success', 'Educational Institute has been deleted successfully');
    }
}

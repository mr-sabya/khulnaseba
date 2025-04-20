<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\LawDepartment;
use App\Models\Lawyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
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
            return datatables()->of(Lawyer::latest()->get())
                ->addColumn('department', function ($data) {
                    if ($data->department) {
                        return $data->department['name'];
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
                    $button = '<a href="' . route('admin.lawyer.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.lawyer.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['department', 'district', 'city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.lawyer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = LawDepartment::orderBy('name', 'ASC')->get();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.lawyer.create', compact('departments', 'districts', 'cities'));
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
            'phone' => 'required|max:15|unique:lawyers',
            'department_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        Lawyer::create($input);

        return redirect()->route('admin.lawyer.index')->with('success', 'New Lawyer has been added successfully');
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
        $lawyer = Lawyer::findOrFail(intval($id));
        $departments = LawDepartment::orderBy('name', 'ASC')->get();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.lawyer.edit', compact('lawyer', 'departments', 'districts', 'cities'));
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
        $lawyer = Lawyer::findOrFail(intval($id));

        if ($lawyer->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15',
                'department_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15|unique:lawyers',
                'department_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }

        $input = $request->all();

        $lawyer->update($input);

        return redirect()->route('admin.lawyer.index')->with('success', 'Lawyer has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lawyer = Lawyer::findOrFail(intval($id));
        $lawyer->delete();
        return redirect()->route('admin.lawyer.index')->with('success', 'Lawyer has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
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
            return datatables()->of(Library::latest()->get())
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
                    $button = '<a href="' . route('admin.library.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.library.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['district', 'city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.library.index');
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

        return view('backend.library.create', compact('districts', 'cities'));
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
            'phone' => 'required|max:15|unique:libraries',
            'address' => 'required|string|max:255',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        Library::create($input);

        return redirect()->route('admin.library.index')->with('success', 'New Library  has been added successfully');
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
        $library = Library::findOrFail(intval($id));
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.library.edit', compact('library', 'districts', 'cities'));
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
        $library = Library::findOrFail(intval($id));

        if ($library->phone == $request->phone) {
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
                'phone' => 'required|max:15|unique:libraries',
                'address' => 'required|string|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }

        $input = $request->all();

        $library->update($input);

        return redirect()->route('admin.library.index')->with('success', 'Library has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $library = Library::findOrFail(intval($id));
        $library->delete();
        return redirect()->route('admin.library.index')->with('success', 'Library has been deleted successfully');
    }
}

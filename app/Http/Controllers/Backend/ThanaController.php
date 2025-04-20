<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Thana;
use App\Models\District;
use App\Models\ThanaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThanaController extends Controller
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
            return datatables()->of(Thana::latest()->get())
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
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.thana.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.thana.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['district', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.thana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ThanaCategory::all();
        $districts = District::orderBy('name', 'ASC')->get();

        return view('backend.thana.create', compact('districts', 'categories'));
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
            'phone' => 'required|string|max:15|unique:thanas',
            'address' => 'required|string|max:255',
            'category_id' => 'required',
            'district_id' => 'required',
        ]);

        $input = $request->all();

        Thana::create($input);

        return redirect()->route('admin.thana.index')->with('success', 'New Thana has been added successfully');
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
        $categories = ThanaCategory::all();
        $thana = Thana::findOrFail(intval($id));
        $districts = District::orderBy('name', 'ASC')->get();

        return view('backend.thana.edit', compact('thana', 'districts', 'categories'));
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
        $thana = Thana::findOrFail(intval($id));

        if ($thana->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'address' => 'required|string|max:255',
                'category_id' => 'required',
                'district_id' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15|unique:shops',
                'address' => 'required|string|max:255',
                'category_id' => 'required',
                'district_id' => 'required',
            ]);
        }

        $input = $request->all();

        $thana->update($input);

        return redirect()->route('admin.thana.index')->with('success', 'Thana has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thana = Thana::findOrFail(intval($id));
        $thana->delete();
        return redirect()->route('admin.thana.index')->with('success', 'Thana has been deleted successfully');
    }
}

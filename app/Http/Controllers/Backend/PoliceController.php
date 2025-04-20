<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Police;
use App\Models\Thana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PoliceController extends Controller
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
            return datatables()->of(Police::latest()->get())
                ->addColumn('thana', function ($data) {
                    return $data->thana['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.police.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.police.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['thana', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.police.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thanas = Thana::orderBy('name', 'ASC')->get();

        return view('backend.police.create', compact('thanas'));
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
            'designation' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:police',
            'thana_id' => 'required',
        ]);

        $input = $request->all();

        Police::create($input);

        return redirect()->route('admin.police.index')->with('success', 'New Police has been added successfully');
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
        $police = Police::findOrFail(intval($id));
        $thanas = Thana::orderBy('name', 'ASC')->get();

        return view('backend.police.edit', compact('police', 'thanas'));
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
        $police = Police::findOrFail(intval($id));

        if ($police->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'thana_id' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'phone' => 'required|string|max:15|unique:police',
                'thana_id' => 'required',
            ]);
        }

        $input = $request->all();

        $police->update($input);

        return redirect()->route('admin.police.index')->with('success', 'Police has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $police = Police::findOrFail(intval($id));
        $police->delete();
        return redirect()->route('admin.police.index')->with('success', 'Police has been deleted successfully');
    }
}

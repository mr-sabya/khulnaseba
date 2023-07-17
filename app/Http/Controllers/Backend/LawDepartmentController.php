<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LawDepartment;
use Illuminate\Http\Request;

class LawDepartmentController extends Controller
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
            return datatables()->of(LawDepartment::latest()->get())
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.lawdepartment.edit', $data->id).'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-route="'.route('admin.lawdepartment.destroy', $data->id).'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('backend.lawdepartment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lawdepartment.create');
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
            'name' => 'required|string|max:255|unique:law_departments',
        ]);

        $input = $request->all();

        LawDepartment::create($input);

        return redirect()->route('admin.lawdepartment.index')->with('success', 'New Law Department has been added successfully');
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
        $law = LawDepartment::findOrFail(intval($id));
        return view('backend.lawdepartment.edit', compact('law'));
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
        $law = LawDepartment::findOrFail(intval($id));

        if($law->name == $request->name){
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|max:255|unique:law_departments',
            ]);
        }
        
        $input = $request->all();
        $law->update($input);

        return redirect()->route('admin.lawdepartment.index')->with('success', 'Law Department has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $law = LawDepartment::findOrFail(intval($id));
        $law->delete();

        return redirect()->route('admin.lawdepartment.index')->with('success', 'Law Department has been deleted successfully');
    }
}

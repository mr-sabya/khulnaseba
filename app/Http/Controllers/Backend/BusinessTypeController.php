<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use Illuminate\Http\Request;

class BusinessTypeController extends Controller
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
            return datatables()->of(BusinessType::latest()->get())
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.businesstype.edit', $data->id).'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-route="'.route('admin.businesstype.destroy', $data->id).'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('backend.businesstype.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.businesstype.create');
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
            'name' => 'required|string|max:255|unique:business_types',
        ]);

        $input = $request->all();

        BusinessType::create($input);

        return redirect()->route('admin.businesstype.index')->with('success', 'New Business Type has been added successfully');
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
        $businesstype = BusinessType::findOrFail(intval($id));
        return view('backend.businesstype.edit', compact('businesstype'));
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
        $businesstype = BusinessType::findOrFail(intval($id));

        if($businesstype->name == $request->name){
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|max:255|unique:business_types',
            ]);
        }
        
        $input = $request->all();

        $businesstype->update($input);

        return redirect()->route('admin.businesstype.index')->with('success', 'Business Type has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $businesstype = BusinessType::findOrFail(intval($id));
        $businesstype->delete();

        return redirect()->route('admin.businesstype.index')->with('success', 'Business Type has been deleted successfully');
    }
}

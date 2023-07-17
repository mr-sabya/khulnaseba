<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Journalist;
use Illuminate\Http\Request;

class JournalistController extends Controller
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
            return datatables()->of(Journalist::latest()->get())
            ->addColumn('district', function($data){
                return $data->district['name'];
            })
            ->addColumn('city', function($data){
                return $data->city['name'];
            })
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.journalist.edit', $data->id).'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-route="'.route('admin.journalist.destroy', $data->id).'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['district', 'city', 'action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('backend.journalist.index');
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

        return view('backend.journalist.create', compact('districts', 'cities'));
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
            'phone' => 'required|max:15|unique:journalists',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();
    
        Journalist::create($input);

        return redirect()->route('admin.journalist.index')->with('success', 'New Journalist has been added successfully');
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
        $journalist = Journalist::findOrFail(intval($id));
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.journalist.edit', compact('journalist', 'districts', 'cities'));
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
        $journalist = Journalist::findOrFail(intval($id));

        if($journalist->phone == $request->phone){
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|max:15|unique:journalists',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }
        

        $input = $request->all();
    
        $journalist->update($input);

        return redirect()->route('admin.journalist.index')->with('success', 'Journalist has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journalist = Journalist::findOrFail(intval($id));
        $journalist->delete();

        return redirect()->route('admin.journalist.index')->with('success', 'Journalist has been deleted successfully');
    }
}

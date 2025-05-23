<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusRouteController extends Controller
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
        // return BusRoute::with('buses')->get();
        if (request()->ajax()) {
            return datatables()->of(BusRoute::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.busroute.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.busroute.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.bus.busroute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::orderBy('id', 'ASC')->get();
        return view('backend.bus.busroute.create', compact('buses'));
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
            'name' => 'required|string|max:255|unique:bus_routes',
        ]);

        $input = $request->all();

        $busroute = BusRoute::create($input);
        $busroute->buses()->sync($request->bus);

        return redirect()->route('admin.busroute.index')->with('success', 'New Bus Route has been added successfully');
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
        $busroute = BusRoute::findOrFail(intval($id));
        $buses = Bus::orderBy('id', 'ASC')->get();
        return view('backend.bus.busroute.edit', compact('busroute', 'buses'));
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
        $busroute = BusRoute::findOrFail(intval($id));

        if ($busroute->name == $request->name) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255|unique:bus_routes',
            ]);
        }

        $input = $request->all();

        $busroute->update($input);
        $busroute->buses()->sync($request->bus);

        return redirect()->route('admin.busroute.index')->with('success', 'Bus Route has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $busroute = BusRoute::findOrFail(intval($id));
        $busroute->delete();

        return redirect()->route('admin.busroute.index')->with('success', 'Bus Route has been deleted successfully');
    }
}

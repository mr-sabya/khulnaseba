<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PlaneRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaneRouteController extends Controller
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
            return datatables()->of(PlaneRoute::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.plane-route.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.plane-route.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.plane.route.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.plane.route.create');
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
            'name' => 'required|string|max:255|unique:plane_routes',
        ]);

        $input = $request->all();

        PlaneRoute::create($input);

        return redirect()->route('admin.plane-route.index')->with('success', 'New Plane Route has been added successfully');
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
        $plane_route = PlaneRoute::findOrFail(intval($id));
        return view('backend.plane.route.edit', compact('plane_route'));
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
        $plane_route = PlaneRoute::findOrFail(intval($id));

        if ($plane_route->name == $request->name) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255|unique:plane_routes',
            ]);
        }

        $input = $request->all();

        $plane_route->update($input);

        return redirect()->route('admin.plane-route.index')->with('success', 'Plane Route has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plane_route = PlaneRoute::findOrFail(intval($id));
        $plane_route->delete();

        return redirect()->route('admin.plane-route.index')->with('success', 'Plane Route has been deleted successfully');
    }
}

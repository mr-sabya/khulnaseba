<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BusCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusCounterController extends Controller
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
            return datatables()->of(BusCounter::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.buscounter.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.buscounter.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.bus.counter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bus.counter.create');
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
            'counter' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:bus_counters',
            'address' => 'required|string|max:255',
        ]);

        $input = $request->all();

        BusCounter::create($input);

        return redirect()->route('admin.buscounter.index')->with('success', 'New Bus Counter has been added successfully');
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
        $counter = BusCounter::findOrFail(intval($id));
        return view('backend.bus.counter.edit', compact('counter'));
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
        $counter = BusCounter::findOrFail(intval($id));

        if ($counter->phone == $request->phone) {
            $request->validate([
                'counter' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'counter' => 'required|string|max:255',
                'phone' => 'required|string|max:20|unique:bus_counters',
                'address' => 'required|string|max:255',
            ]);
        }

        $input = $request->all();

        $counter->update($input);

        return redirect()->route('admin.buscounter.index')->with('success', 'Bus Counter has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counter = BusCounter::findOrFail(intval($id));
        $counter->delete();

        return redirect()->route('admin.buscounter.index')->with('success', 'Bus Counter has been updated successfully');
    }
}

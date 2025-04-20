<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusCounter;
use App\Models\BusRoute;
use App\Models\BusTicket;
use App\Models\BusType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusTicketController extends Controller
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
            return datatables()->of(BusTicket::latest()->get())
                ->addColumn('route', function ($data) {
                    if ($data->route) {
                        return $data->route['name'];
                    }
                })
                ->addColumn('bus', function ($data) {
                    if ($data->bus) {
                        return $data->bus['name'];
                    }
                })
                ->addColumn('type', function ($data) {
                    if ($data->type) {
                        return $data->type['name'];
                    }
                })
                ->addColumn('counter', function ($data) {
                    if ($data->counter) {
                        return $data->counter['counter'];
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.busticket.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.busticket.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['route', 'bus', 'type', 'counter', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.bus.busticket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::orderBy('name', 'ASC')->get();
        $routes = BusRoute::orderBy('name', 'ASC')->get();
        $types = BusType::orderBy('name', 'ASC')->get();
        $counters = BusCounter::orderBy('counter', 'ASC')->get();

        return view('backend.bus.busticket.create', compact('types', 'buses', 'routes', 'counters'));
    }

    /**
     * Store a newly created resource in storage.
     * 'route_id', 'bus_id', 'counter', 'address', 'phone', 'price', 'info'
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'route_id' => 'required',
            'bus_id' => 'required',
            'type_id' => 'required',
            'counter_id' => 'required',
            'price' => 'required',
        ]);

        $input = $request->all();

        BusTicket::create($input);

        return redirect()->route('admin.busticket.index')->with('success', 'New Bus Ticket has been added successfully');
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
        $busticket = BusTicket::findOrFail(intval($id));
        $buses = Bus::orderBy('name', 'ASC')->get();
        $routes = BusRoute::orderBy('name', 'ASC')->get();
        $types = BusType::orderBy('name', 'ASC')->get();
        $counters = BusCounter::orderBy('counter', 'ASC')->get();

        return view('backend.bus.busticket.edit', compact('busticket', 'types', 'buses', 'routes', 'counters'));
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
        $busticket = BusTicket::findORFail(intval($id));

        $request->validate([
            'route_id' => 'required',
            'bus_id' => 'required',
            'type_id' => 'required',
            'counter_id' => 'required',
            'price' => 'required',
        ]);

        $input = $request->all();

        $busticket->update($input);

        return redirect()->route('admin.busticket.index')->with('success', 'Bus Ticket has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $busticket = BusTicket::findORFail(intval($id));
        $busticket->delete();

        return redirect()->route('admin.busticket.index')->with('success', 'Bus Ticket has been deleted successfully');
    }
}

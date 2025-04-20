<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Airline;
use App\Models\PlaneCounter;
use App\Models\PlaneRoute;
use App\Models\PlaneTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaneTicketController extends Controller
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
        // return PlaneTicket::with('airlines')->get();

        if (request()->ajax()) {
            return datatables()->of(PlaneTicket::latest()->get())
                ->addColumn('route', function ($data) {
                    if ($data->route) {
                        return $data->route['name'];
                    }
                })
                ->addColumn('airline', function ($data) {
                    if ($data->airline) {
                        return $data->airline['name'];
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.plane-ticket.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.plane-ticket.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['route', 'airline', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.plane.ticket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airlines = Airline::orderBy('name', 'ASC')->get();
        $routes = PlaneRoute::orderBy('name', 'ASC')->get();
        $counters = PlaneCounter::orderBy('id', 'ASC')->get();
        return view('backend.plane.ticket.create', compact('routes', 'counters', 'airlines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $ticket = PlaneTicket::create($input);
        $ticket->counters()->sync($request->counter);

        return redirect()->route('admin.plane-ticket.index')->with('success', 'New Plane Ticket Counter has been added successfully');
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
        $ticket = PlaneTicket::findOrFail(intval($id));
        $airlines = Airline::orderBy('name', 'ASC')->get();
        $routes = PlaneRoute::orderBy('name', 'ASC')->get();
        $counters = PlaneCounter::orderBy('id', 'ASC')->get();

        return view('backend.plane.ticket.edit', compact('ticket', 'airlines', 'routes', 'counters'));
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
        $ticket = PlaneTicket::findOrFail(intval($id));

        $input = $request->all();

        $ticket->update($input);
        $ticket->counters()->sync($request->counter);

        return redirect()->route('admin.plane-ticket.index')->with('success', 'Plane Ticket Counter has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plane = PlaneTicket::findOrFail(intval($id));
        $plane->delete();

        return redirect()->route('admin.plane-ticket.index')->with('success', 'Plane Ticket Counter has been deleted successfully');
    }
}

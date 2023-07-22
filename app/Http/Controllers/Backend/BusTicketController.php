<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\BusTicket;
use Illuminate\Http\Request;

class BusTicketController extends Controller
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
            return datatables()->of(BusTicket::latest()->get())
            ->addColumn('route', function($data){
                return $data->route['name'];
            })
            ->addColumn('bus', function($data){
                return $data->bus['name'];
            })
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.busticket.edit', $data->id).'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-route="'.route('admin.busticket.destroy', $data->id).'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['route', 'bus', 'action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('backend.busticket.index');
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

        return view('backend.busticket.create', compact('buses', 'routes'));
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
            'counter' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required',
            'phone' => 'required|string|max:255|unique:bus_tickets',
            'info' => 'nullable|string|max:255',
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

        return view('backend.busticket.edit', compact('busticket', 'buses', 'routes'));
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

        if($busticket->phone == $request->phone){
            $request->validate([
                'route_id' => 'required',
                'bus_id' => 'required',
                'counter' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'price' => 'required',
                'phone' => 'required|string|max:255',
                'info' => 'nullable|string|max:255',
            ]);
    
        }else{
            $request->validate([
                'route_id' => 'required',
                'bus_id' => 'required',
                'counter' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'price' => 'required',
                'phone' => 'required|string|max:255|unique:bus_tickets',
                'info' => 'nullable|string|max:255',
            ]);
    
        }
        
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
        //
    }
}

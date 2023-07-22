<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Train;
use App\Models\TrainClass;
use App\Models\TrainRoute;
use App\Models\TrainTicket;
use Illuminate\Http\Request;

class TrainTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(TrainTicket::latest()->get())
                ->addColumn('route', function ($data) {
                    return $data->trainRoute['name'];
                })
                ->addColumn('class', function ($data) {
                    return $data->trainClass['name'];
                })
                ->addColumn('train', function ($data) {
                    return $data->train['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.trainticket.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-route="' . route('admin.trainticket.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    return $button;
                })
                ->rawColumns(['route', 'class', 'train', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.train.ticket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $train_routes = TrainRoute::orderBy('name', 'ASC')->get();
        $train_classes = TrainClass::orderBy('name', 'ASC')->get();
        $trains = Train::orderBy('name', 'ASC')->get();

        return view('backend.train.ticket.create', compact('train_routes', 'train_classes', 'trains'));
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
            'route_id' => 'required',
            'class_id' => 'required',
            'train_id' => 'required',
            'amount' => 'required',
        ]);

        $input = $request->all();

        TrainTicket::create($input);

        return redirect()->route('admin.trainticket.index')->with('success', 'New Train Ticket has been added successfully');
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
        $ticket = TrainTicket::findOrFail(intval($id));
        $train_routes = TrainRoute::orderBy('name', 'ASC')->get();
        $train_classes = TrainClass::orderBy('name', 'ASC')->get();
        $trains = Train::orderBy('name', 'ASC')->get();

        return view('backend.train.ticket.edit', compact('ticket', 'train_routes', 'train_classes', 'trains'));
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
        $ticket = TrainTicket::findOrFail(intval($id));

        $request->validate([
            'route_id' => 'required',
            'class_id' => 'required',
            'train_id' => 'required',
            'amount' => 'required',
        ]);

        $input = $request->all();
        $ticket->update($input);

        return redirect()->route('admin.trainticket.index')->with('success', 'Train Ticket has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = TrainTicket::findOrFail(intval($id));
        $ticket->delete();
        return redirect()->route('admin.trainticket.index')->with('success', 'Train Ticket has been deleted successfully');
    }
}

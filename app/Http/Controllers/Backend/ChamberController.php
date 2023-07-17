<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Chamber;
use App\Models\Doctor;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Chunk;

class ChamberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $doctor = Doctor::findOrFail(intval($id));
        $chambers = Chamber::where('doctor_id', $doctor->id)->get();
        return view('backend.chamber.index', compact('doctor', 'chambers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'phone_1' => 'required|string|max:255',
            'phone_2' => 'nullable|string|max:255',
        ]);

        $doctor = Doctor::where('id', $request->doctor_id)->first();

        $input = $request->all();
        Chamber::create($input);

        return redirect()->route('admin.chamber.index', $doctor->id)->with('success', 'New Chamber has been added successfully');
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
        $chamber = Chamber::findOrFail(intval($id));
        return view('backend.chamber.edit', compact('chamber'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'phone_1' => 'required|string|max:255',
            'phone_2' => 'nullable|string|max:255',
        ]);

        $chamber = Chamber::findOrfail(intval($id));

        $input = $request->all();
        $chamber->update($input);

        return redirect()->route('admin.chamber.index', $chamber->doctor_id)->with('success', 'Chamber has been updated successfully');
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

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Namaz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NamazController extends Controller
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
            return datatables()->of(Namaz::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.namaz.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.namaz.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.namaz.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('backend.namaz.create', compact('divisions'));
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
            'hijri_date' => 'required',
            'date' => 'required|unique:namazs',
            'division_id' => 'required',
            'tahajjud' => 'required',
            'fojr' => 'required',
            'sun_rise' => 'required',
            'ishraq' => 'required',
            'noon' => 'required',
            'johor' => 'required',
            'asor' => 'required',
            'sun_set' => 'required',
            'magrib' => 'required',
            'isha' => 'required',
        ]);

        $input = $request->all();

        Namaz::create($input);

        return redirect()->route('admin.namaz.index')->with('success', 'New Namaz has been added successfully');
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
        $namaz = Namaz::findOrFail(intval($id));
        $divisions = Division::all();
        return view('backend.namaz.edit', compact('namaz', 'divisions'));
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
        $namaz = Namaz::findOrFail(intval($id));

        if ($namaz->date == $request->date) {
            $request->validate([
                'hijri_date' => 'required',
                'date' => 'required',
                'division_id' => 'required',
                'tahajjud' => 'required',
                'fojr' => 'required',
                'sun_rise' => 'required',
                'ishraq' => 'required',
                'noon' => 'required',
                'johor' => 'required',
                'asor' => 'required',
                'sun_set' => 'required',
                'magrib' => 'required',
                'isha' => 'required',
            ]);
        } else {
            $request->validate([
                'hijri_date' => 'required',
                'date' => 'required|unique:namazs',
                'division_id' => 'required',
                'tahajjud' => 'required',
                'fojr' => 'required',
                'sun_rise' => 'required',
                'ishraq' => 'required',
                'noon' => 'required',
                'johor' => 'required',
                'asor' => 'required',
                'sun_set' => 'required',
                'magrib' => 'required',
                'isha' => 'required',
            ]);
        }



        $input = $request->all();

        $namaz->update($input);

        return redirect()->route('admin.namaz.index')->with('success', 'Namaz has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $namaz = Namaz::findOrFail(intval($id));
        $namaz->delete();

        return redirect()->route('admin.namaz.index')->with('success', 'Nwamaz has been deleted successfully');
    }
}

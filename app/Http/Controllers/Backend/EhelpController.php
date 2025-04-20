<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ehelp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EhelpController extends Controller
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
            return datatables()->of(Ehelp::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.ehelp.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.ehelp.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.ehelp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ehelp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        $input = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/ehelp/', $filename);
            $input['logo'] = $filename;
        }

        Ehelp::create($input);

        return redirect()->route('admin.ehelp.index')->with('success', 'E-Help has been added successfully');
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
        $ehelp = Ehelp::findOrFail(intval($id));
        return view('backend.ehelp.edit', compact('ehelp'));
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
        $ehelp = Ehelp::findOrFail(intval($id));

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);


        $input = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/ehelp/', $filename);
            $input['logo'] = $filename;
        }

        $ehelp->update($input);

        return redirect()->route('admin.ehelp.index')->with('success', 'E-Help has been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ehelp = Ehelp::findOrFail(intval($id));
        $ehelp->delete();

        return redirect()->route('admin.ehelp.index')->with('success', 'E-Help has been deleted successfully');
    }
}

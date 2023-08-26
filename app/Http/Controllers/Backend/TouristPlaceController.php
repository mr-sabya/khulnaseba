<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PlaceType;
use App\Models\TouristPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TouristPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(TouristPlace::latest()->get())
                ->addColumn('type', function ($data) {
                    return $data->placeType['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.touristplace.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.touristplace.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['type', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.touristplace.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = PlaceType::orderBy('name', 'ASC')->get();

        return view('backend.touristplace.create', compact('types'));
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
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15|unique:tourist_places',
            'type_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/tourist-place/', $filename);
            $input['image'] = $filename;
        }

        TouristPlace::create($input);

        return redirect()->route('admin.touristplace.index')->with('success', 'New Tourist Place has been added successfully');
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
        $touristplace = TouristPlace::findOrFail(intval($id));
        $types = PlaceType::orderBy('name', 'ASC')->get();

        return view('backend.touristplace.edit', compact('touristplace', 'types'));
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
        $touristplace = TouristPlace::findOrFail(intval($id));

        if ($touristplace->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'nullable|string|max:15',
                'type_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'nullable|string|max:15|unique:tourist_places',
                'type_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/tourist-place/', $filename);
            $input['image'] = $filename;
        }

        $touristplace->update($input);

        return redirect()->route('admin.touristplace.index')->with('success', 'Tourist Place has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $touristplace = TouristPlace::findOrFail(intval($id));
        $touristplace->delete();

        return redirect()->route('admin.touristplace.index')->with('success', 'Tourist Place has been deleted successfully');
    }
}

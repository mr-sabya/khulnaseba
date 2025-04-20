<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BusinessIdea;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessIdeaController extends Controller
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
            return datatables()->of(BusinessIdea::latest()->get())
                ->addColumn('type', function ($data) {
                    return $data->businessType['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.businessidea.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.businessidea.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['type', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.businessidea.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = BusinessType::orderBy('name', 'ASC')->get();

        return view('backend.businessidea.create', compact('types'));
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:business_ideas',
            'type_id' => 'required',
            'details' => 'required',
            'short_description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/business-idea/', $filename);
            $input['image'] = $filename;
        }

        BusinessIdea::create($input);

        return redirect()->route('admin.businessidea.index')->with('success', 'New Business Idea has been added successfully');
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
        $businessidea = BusinessIdea::findOrFail(intval($id));
        $types = BusinessType::orderBy('name', 'ASC')->get();

        return view('backend.businessidea.edit', compact('businessidea', 'types'));
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
        $businessidea = BusinessIdea::findOrFail(intval($id));

        if ($businessidea->slug == $request->slug) {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'type_id' => 'required',
                'details' => 'required',
                'short_description' => 'required|max:255',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:business_ideas',
                'type_id' => 'required',
                'details' => 'required',
                'short_description' => 'required|max:255',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/business-idea/', $filename);
            $input['image'] = $filename;
        }

        $businessidea->update($input);

        return redirect()->route('admin.businessidea.index')->with('success', 'Business Idea has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $businessidea = BusinessIdea::findOrFail(intval($id));
        $businessidea->delete();

        return redirect()->route('admin.businessidea.index')->with('success', 'Business Idea has been deleted successfully');
    }
}

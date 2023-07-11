<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\Newspaper;



class NewspaperController extends Controller
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
            return datatables()->of(Newspaper::latest()->get())
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.newspaper.edit', $data->id).'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-route="'.route('admin.newspaper.destroy', $data->id).'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('backend.newspaper.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.newspaper.create');
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
            'slug' => 'required|string|max:255|unique:newspapers',
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        $input = $request->all();


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('images/newspaper/', $filename);
            $input['image'] = $filename;
        }

        Newspaper::create($input);

        return redirect()->route('admin.newspaper.index')->with('success', 'Newspaper has been added successfully');
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
        $newspaper = Newspaper::findOrFail(intval($id));
        return view('backend.newspaper.edit', compact('newspaper'));
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

        $newspaper = Newspaper::findOrFail(intval($id));

        if($newspaper->slug == $request->slug){
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'link' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:newspapers',
                'link' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        }
        

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('images/newspaper/', $filename);
            $input['image'] = $filename;
        }

        $newspaper->update($input);

        return redirect()->route('admin.newspaper.index')->with('success', 'Newspaper has been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newspaper = Newspaper::findOrFail(intval($id));
        $newspaper->delete();

        return redirect()->route('admin.newspaper.index')->with('success', 'Newspaper has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
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
            return datatables()->of(Story::latest()->get())
                ->addColumn('category', function ($data) {
                    return $data->storyCategory['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.story.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.story.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['category', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.story.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = StoryCategory::orderBy('name', 'ASC')->get();

        return view('backend.story.create', compact('categories'));
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
            'slug' => 'required|string|max:255|unique:stories',
            'details' => 'required',
            'category_id' => 'required',
            'writer' => 'nullable|required|max:255',
            'reference' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/story/', $filename);
            $input['image'] = $filename;
        }

        Story::create($input);

        return redirect()->route('admin.story.index')->with('success', 'New Story has been added successfully');
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
        $story = Story::findOrFail(intval($id));
        $categories = StoryCategory::orderBy('name', 'ASC')->get();

        return view('backend.story.edit', compact('story', 'categories'));
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
        $story = Story::findOrFail(intval($id));

        if ($story->slug == $request->slug) {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'details' => 'required',
                'category_id' => 'required',
                'writer' => 'nullable|required|max:255',
                'reference' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:stories',
                'details' => 'required',
                'category_id' => 'required',
                'writer' => 'nullable|required|max:255',
                'reference' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/story/', $filename);
            $input['image'] = $filename;
        }

        $story->update($input);

        return redirect()->route('admin.story.index')->with('success', 'Story has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::findOrFail(intval($id));
        $story->delete();
        return redirect()->route('admin.story.index')->with('success', 'Story has been deleted successfully');
    }
}

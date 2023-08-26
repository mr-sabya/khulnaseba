<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
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
            return datatables()->of(Blog::latest()->get())
                ->addColumn('category', function ($data) {
                    return $data->blogCategory['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.blog.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.blog.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['category', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('backend.blog.create', compact('categories'));
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
            'slug' => 'required|string|max:255|unique:blogs',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
            'blog' => 'required',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/blog/', $filename);
            $input['image'] = $filename;
        }

        $input['user_id'] = Auth::User()->id;

        Blog::create($input);

        return redirect()->route('admin.blog.index')->with('success', 'New Blog has been added successfully');
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
        $blog = Blog::findOrFail(intval($id));
        $categories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('backend.blog.edit', compact('blog', 'categories'));
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
        $blog = Blog::findOrFail(intval($id));

        if ($blog->slug == $request->slug) {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'category_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
                'blog' => 'required',
                'meta_description' => 'nullable|string|max:255',
            ]);
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blogs',
                'category_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
                'blog' => 'required',
                'meta_description' => 'nullable|string|max:255',
            ]);
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/blog/', $filename);
            $input['image'] = $filename;
        }

        $blog->update($input);

        return redirect()->route('admin.blog.index')->with('success', 'Blog has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail(intval($id));
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
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
            return datatables()->of(Course::latest()->get())
                ->addColumn('category', function ($data) {
                    return $data->category['name'];
                })
                ->addColumn('course_type', function ($data) {
                    if ($data->type == 1) {
                        return "Offline";
                    } else if ($data->type == 2) {
                        return "Online";
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.course.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.course.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['category', 'course_type', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.course.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CourseCategory::orderBy('name', 'ASC')->get();
        return view('backend.course.course.create', compact('categories'));
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
            'slug' => 'required|string|max:255|unique:courses',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
            'details' => 'required',
            'type' => 'required',
            'short_desc' => 'required|string|max:255',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/course/', $filename);
            $input['image'] = $filename;
        }

        Course::create($input);

        return redirect()->route('admin.course.index')->with('success', 'New Course has been added successfully');
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
        $course = Course::findOrFail(intval($id));
        $categories = CourseCategory::orderBy('name', 'ASC')->get();

        return view('backend.course.course.edit', compact('course', 'categories'));
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
        $course = Course::findOrFail(intval($id));

        if ($course->slug == $request->slug) {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'category_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
                'details' => 'required',
                'type' => 'required',
                'short_desc' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:courses',
                'category_id' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
                'details' => 'required',
                'type' => 'required',
                'short_desc' => 'required|string|max:255',
            ]);
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/course/', $filename);
            $input['image'] = $filename;
        }

        $course->update($input);

        return redirect()->route('admin.course.index')->with('success', 'Course has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail(intval($id));
        $course->delete();
        return redirect()->route('admin.course.index')->with('success', 'Course has been deleted successfully');
    }
}

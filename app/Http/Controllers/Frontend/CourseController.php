<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseRegistration;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'DESC')->get();
        $categories = CourseCategory::all();
        return view('frontend.course.index', compact('courses', 'categories'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return view('frontend.course.show', compact('course'));
    }

    public function applyForm($id)
    {
        $course = Course::findOrFail(intval($id));
        $courses = Course::all();
        return view('frontend.course.form', compact('course', 'courses'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required',
        ]);

        $input = $request->all();

        CourseRegistration::create($input);

        return redirect()->route('course.apply.form', $request->course_id)->with('success', 'Thank you for your application');

    }
}

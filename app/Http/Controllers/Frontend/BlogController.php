<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(12);
        return view('frontend.blog.index', compact('blogs'));    
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $categories = BlogCategory::orderBy('name', 'ASC')->get();
        $recent_blogs = Blog::orderBy('id', 'DESC')->take(6)->get();
        return view('frontend.blog.show', compact('blog', 'categories', 'recent_blogs'));
    }
}

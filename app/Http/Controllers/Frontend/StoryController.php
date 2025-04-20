<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryCategory;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('id', 'DESC')->paginate(12);
        $recent_stories = Story::orderBy('id', 'DESC')->take(5)->get();
        $categories = StoryCategory::all();
        $c_category = 'all';
        return view('frontend.story.index', compact('stories', 'categories', 'recent_stories', 'c_category'));   
    }

    public function category($slug)
    {
        $category = StoryCategory::where('slug', $slug)->first();
        $c_category = $category->name;

        $stories = Story::where('category_id', $category->id)->orderBy('id', 'DESC')->paginate(12);
        $recent_stories = Story::orderBy('id', 'DESC')->take(5)->get();
        $categories = StoryCategory::all();

        return view('frontend.story.index', compact('stories', 'categories', 'recent_stories', 'c_category'));   
    }

    public function show($slug)
    {
        $story = Story::where('slug', $slug)->first();
        $stories = Story::where('category_id', $story->category_id)->take(3)->get();
        $categories = StoryCategory::all();
        
        return view('frontend.story.show', compact('story', 'stories', 'categories'));
    }
}

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
        $stories = Story::orderBy('id', 'DESC')->paginate(15);
        return view('frontend.story.index', compact('stories'));   
    }

    public function show($slug)
    {
        $story = Story::where('slug', $slug)->first();
        $stories = Story::where('category_id', $story->category_id)->take(3)->get();
        $categories = StoryCategory::all();
        
        return view('frontend.story.show', compact('story', 'stories', 'categories'));
    }
}

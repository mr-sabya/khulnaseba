<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BusinessIdea;
use App\Models\BusinessType;
use Illuminate\Http\Request;

class BusinessIdeaController extends Controller
{
    public function index()
    {
        $ideas = BusinessIdea::orderBy('id', 'DESC')->paginate(12);
        return view('frontend.business-idea.index', compact('ideas'));    
    }

    public function show($slug)
    {
        $idea = BusinessIdea::where('slug', $slug)->firstOrFail();
        $ideas = BusinessIdea::where('type_id', $idea->type_id)->take(5)->get();
        $types = BusinessType::orderBy('name', 'ASC')->get();
        return view('frontend.business-idea.show', compact('idea', 'ideas', 'types'));
        
    }
}

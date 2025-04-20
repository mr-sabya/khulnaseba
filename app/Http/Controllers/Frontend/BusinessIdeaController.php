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
        $recent_ideas = BusinessIdea::orderBy('id', 'DESC')->take(5)->get();
        $types = BusinessType::orderBy('name', 'ASC')->get();
        $c_category = 'all';
        return view('frontend.business-idea.index', compact('ideas', 'recent_ideas', 'types', 'c_category'));    
    }

    public function type($id)
    {
        $type = BusinessType::findOrFail(intval($id));

        $ideas = BusinessIdea::where('type_id', $type->id)->orderBy('id', 'DESC')->paginate(12);
        $recent_ideas = BusinessIdea::orderBy('id', 'DESC')->take(5)->get();
        $types = BusinessType::orderBy('name', 'ASC')->get();
        $c_category = $type->name;
        return view('frontend.business-idea.index', compact('ideas', 'recent_ideas', 'types', 'c_category'));    
    }

    public function show($slug)
    {
        $idea = BusinessIdea::where('slug', $slug)->firstOrFail();
        $ideas = BusinessIdea::where('type_id', $idea->type_id)->take(5)->get();
        $types = BusinessType::orderBy('name', 'ASC')->get();
        return view('frontend.business-idea.show', compact('idea', 'ideas', 'types'));
        
    }
}

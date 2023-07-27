<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('id', 'DESC')->paginate(12);
        return view('frontend.job.index', compact('jobs'));   
    }
}

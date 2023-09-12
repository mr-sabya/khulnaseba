<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Police;
use App\Models\Thana;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    public function index()
    {
        $thanas = Thana::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.thana.index', compact('thanas', 'districts'));
    }

    public function show($id)
    {
        $thana = Thana::findOrFail(intval($id));
        $polices = Police::where('thana_id', $thana->id)->orderBy('id', 'DESC')->paginate(12);

        return view('frontend.thana.show', compact('polices'));
    }
}

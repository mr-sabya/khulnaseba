<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $libraries = Library::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.library.index', compact('libraries', 'districts'));
    }


    public function search(Request $request)
    {
        if($request->district_id && $request->city_id){
            $libraries = Library::where()->orderBy('id', 'DESC')->paginate(12);
        }else if($request->district_id){
            $libraries = Library::orderBy('id', 'DESC')->paginate(12);
        }else{
            $libraries = Library::orderBy('id', 'DESC')->paginate(12);
        }

        return view('frontend.library.result', compact('libraries'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Journalist;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    public function index()
    {
        $journalists = Journalist::orderBy('id', 'DESC')->paginate(12);
        $districts = District::orderBy('name', 'ASC')->get();

        return view('frontend.journalist.index', compact('journalists', 'districts'));
    }

    public function search(Request $request)
    {
        if($request->district_id && $request->city_id && $request->search){
            $journalists = Journalist::where('city_id', $request->city_id)
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id && $request->city_id){
            $journalists = Journalist::where('city_id', $request->city_id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id && $request->search){
            $journalists = Journalist::where('district_id', $request->district_id)
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->search){
            $journalists = Journalist::where('name', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else if($request->district_id){
            $journalists = Journalist::where('district_id', $request->district_id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
        }else{
            $journalists = Journalist::orderBy('id', 'DESC')->paginate(12);
        }

    	return view('frontend.journalist.result', compact('journalists'));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Shop::latest()->get())
                ->addColumn('category', function ($data) {
                    return $data->shopCategory['name'];
                })
                ->addColumn('district', function ($data) {
                    return $data->district['name'];
                })
                ->addColumn('city', function ($data) {
                    return $data->city['name'];
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.shop.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    if (Auth::user()->is_admin == 1) {
                        $button .= '<button type="button" name="delete" data-route="' . route('admin.shop.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    }
                    return $button;
                })
                ->rawColumns(['category', 'district', 'city', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.shop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ShopCategory::orderBy('name', 'ASC')->get();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.shop.create', compact('categories', 'districts', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'phone' => 'nullable|string|max:15|unique:shops',
            'details' => 'required|max:255',
            'address' => 'required|string|max:255',
            'district_id' => 'required',
            'city_id' => 'required',
        ]);

        $input = $request->all();

        Shop::create($input);

        return redirect()->route('admin.shop.index')->with('success', 'New Shop has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail(intval($id));
        $categories = ShopCategory::orderBy('name', 'ASC')->get();
        $districts = District::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('backend.shop.edit', compact('shop', 'categories', 'districts', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail(intval($id));

        if ($shop->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required',
                'phone' => 'nullable|string|max:15',
                'details' => 'required|max:255',
                'address' => 'required|string|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required',
                'phone' => 'nullable|string|max:15|unique:shops',
                'details' => 'required|max:255',
                'address' => 'required|string|max:255',
                'district_id' => 'required',
                'city_id' => 'required',
            ]);
        }

        $input = $request->all();

        $shop->update($input);

        return redirect()->route('admin.shop.index')->with('success', 'Shop has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail(intval($id));
        $shop->delete();
        return redirect()->route('admin.shop.index')->with('success', 'Shop has been deleted successfully');
    }
}

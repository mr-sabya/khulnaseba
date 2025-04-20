<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(User::latest()->get())
                ->addColumn('role', function ($data) {
                    if ($data->is_admin == 1) {
                        return "Admin";
                    } else {
                        return "User";
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.user.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-route="' . route('admin.user.destroy', $data->id) . '" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete</button>';
                    return $button;
                })
                ->rawColumns(['action', 'role'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
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
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|max:15|unique:users',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            'password' => 'required|min:8|max:255',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/user/', $filename);
            $input['image'] = $filename;
        }

        $input['password'] = Hash::make($request->password);

        User::create($input);

        return redirect()->route('admin.user.index')->with('success', 'New User has been added successfully');
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
        $user = User::findOrFail(intval($id));
        return view('backend.user.edit', compact('user'));
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
        $user = User::findOrFail(intval($id));

        if ($user->phone == $request->phone) {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'nullable|max:15',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'nullable|max:15|unique:users',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            ]);
        }


        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-image-' . $extension;
            $file->move('images/user/', $filename);
            $input['image'] = $filename;
        }

        $user->update($input);

        return redirect()->route('admin.user.index')->with('success', 'User has been updated successfully');
    }

    public function updatePasswordView($id)
    {
        $user = User::findOrFail(intval($id));
        return view('backend.user.password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|max:255|confirmed',
        ]);
        $user = User::findOrFail(intval($id));

        if (Hash::check($request->c_password, $user->password)) {
            return back()->with('error', 'current password does not match');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'password has been changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail(intval($id));
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
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

    
    public function index()
    {
        $setting = Setting::findOrFail(intval(1));
        return view('backend.setting.index', compact('setting'));
    }


    public function updateBanner(Request $request)
    {
        $setting = Setting::findOrFail(intval(1));
        $setting->banner_sub_heading = $request->banner_sub_heading;
        $setting->banner_heading = $request->banner_heading;
        $setting->banner_text = $request->banner_text;
        
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-banner_image-' . $extension;
            $file->move('images/setting/', $filename);
            $setting->banner_image = $filename;
        }

        $setting->save();


        return back()->with('success', 'Banner setting has been updated successfully');
    }


    public function updateAbout(Request $request)
    {
        $setting = Setting::findOrFail(intval(1));

        $setting->about_us_short_text = $request->about_us_short_text;
        $setting->about_us_text = $request->about_us_text;
        
        if ($request->hasFile('about_us_image')) {
            $file = $request->file('about_us_image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-about_us_image-' . $extension;
            $file->move('images/setting/', $filename);
            $setting->about_us_image = $filename;
        }

        $setting->save();

        return back()->with('success', 'About Us setting has been updated successfully');
    }



    public function updateContact(Request $request)
    {
        $setting = Setting::findOrFail(intval(1));

        $setting->address = $request->address;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->contact_text = $request->contact_text;

        $setting->save();

        return back()->with('success', 'Contact Us setting has been updated successfully');
    }


    public function updatePage(Request $request)
    {
        $setting = Setting::findOrFail(intval(1));

        $setting->copyright_text = $request->copyright_text;
        $setting->help = $request->help;
        $setting->terms_conditions = $request->terms_conditions;
        $setting->privacy_policy = $request->privacy_policy;
        $setting->about_khulna = $request->about_khulna;

        $setting->save();

        return back()->with('success', 'Other Pages has been updated successfully');
    }
}

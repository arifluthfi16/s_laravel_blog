<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Session;

class SettingsController extends Controller
{
    public function index(){
        $data = Setting::first();

        return view('admin.settings.index')->with('setting',$data);
    }

    public function update(Request $request){
        $setting = Setting::first();
//        dd($setting);

        $setting->sitename = $request->sitename;
        $setting->phone = $request->phone;
        $setting->location= $request->location;
        $setting->email = $request->email;
        $setting->about = $request->about;

        $setting->save();

        Session::flash('success','Site Settings Updated Successfully');

        return redirect()->back();
    }
}

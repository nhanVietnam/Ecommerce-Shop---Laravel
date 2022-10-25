<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function SiteSetting(){
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update',compact('setting'));
    }

    public function SiteSettingUpdate(Request $request){
        $setting_id = $request->id;
       

        if($request->file('logo')){
            $image = $request->file('logo');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(170,40)->save('upload/logo/'.$name_generate);
            $save_url = 'upload/logo/'.$name_generate;

        SiteSetting::findOrFail($setting_id)->update([
            'phone_one' => $request->input('phone_one'),
            'phone_two' => $request->input('phone_two'),
            'email' => $request->input('email'),
            'company_name' => $request->input('company_name'),
            'company_address' => $request->input('company_address'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'linkedin' => $request->input('linkedin'),
            'youtube' => $request->input('youtube'),
            'logo' => $save_url,
        ]);
        $notification = array(
            'message' => 'Setting Updated With Image Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
        } else {
            SiteSetting::findOrFail($setting_id)->update([
                'logo' => $request->oldlogo,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
            ]);
            $notification = array(
                'message' => 'Setting Updated Successfully',
                'alert-type' => 'info'  
            );
    
            return redirect()->back()->with($notification);
        }
    }

    public function SeoSetting(){
        $seo = Seo::find(1);
        return view('backend.setting.seo_update',compact('seo'));
    }

    public function SeoSettingUpdate(Request $request){
        $seoId = $request->id;
        Seo::findOrFail($seoId)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'google_analytics' => $request->google_analytics,
        ]);
        $notification = array(
            'message' => 'Setting Updated Successfully',
            'alert-type' => 'info'  
        );

        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Intervention\Image\Image;

class SliderController extends Controller
{
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }

    public function SliderStore(Request $request){
        $request->validate([
            'slider_image' => 'required',
        ],[
            'slider_image.required'=>'Vui lòng nhập chọn hình đại diện',
        ]);
        
        $image = $request->file('slider_image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_generate);
        $save_url = 'upload/slider/'.$name_generate;
        
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_image' => $save_url,
            
        ]);

        $notification = array(
            'message' => 'Slider Insert Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('slider'));
    }

    public function SliderUpdate(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('slider_image')){
            unlink($old_img);
            $image = $request->file('slider_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/brand/'.$name_generate);
            $save_url = 'upload/brand/'.$name_generate;

        Slider::findOrFail($slider_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'slider_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('manage-slider')->with($notification);
        
        } else {
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                // 'slider_image' => $save_url,
            ]); 
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'  
            );
    
            return redirect()->route('manage-slider')->with($notification);
        }
    }

    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $image = $slider->slider_image;
        unlink($image);

        Slider::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success',  
        );
        return redirect()->route('manage-slider')->with($notification);

    }

    public function SliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider Inactive Successfully',
            'alert-type' => 'success', 
        );
        return redirect()->back()->with($notification);
    }

    public function SliderActive($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Active Successfully',
            'alert-type' => 'success', 
        );
        return redirect()->back()->with($notification);
    }
}
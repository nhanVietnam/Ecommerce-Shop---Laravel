<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function AllAdminRole(){
        $adminuser = Admin::where('type',2)->latest()->get();
        return view('backend.role.admin_role_all',compact('adminuser'));
    }

    public function AddAdminRole(){
        return view('backend.role.admin_role_create');
    }

    public function StoreAdminRole(Request $request){

        if($request->file('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_generate);
            $save_url = 'upload/admin_images/'.$name_generate;

        }
        
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'slider' => $request->slider,
            'product' => $request->product,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'setting' => $request->setting,
            'blog' => $request->blog,
            'returnorder' => $request->returnorder,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'adminuserrole' => $request->adminuserrole,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->route('all.admin.users')->with($notification);
    }

    public function EditAdminRole($id){
        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin_role_edit',compact('adminuser'));
    }

    public function UpdateAdminRole(Request $request){
        // dd($request);
        $admin_id = $request->id;
        $old_img = $request->old_image;
        
        if($request->file('profile_photo_path')){
            // dd($admin_id);
            if(File::exists($old_img)){
                unlink($old_img);
            }
            $image = $request->file('profile_photo_path');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_generate);
            $save_url = 'upload/admin_images/'.$name_generate;
            // dd($save_url);
        Admin::findOrFail($admin_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'slider' => $request->slider,
            'product' => $request->product,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'setting' => $request->setting,
            'blog' => $request->blog,
            'returnorder' => $request->returnorder,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'adminuserrole' => $request->adminuserrole,
            'profile_photo_path' => $save_url,
        ]);
        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.admin.users')->with($notification);
        } else {
            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'slider' => $request->slider,
            'product' => $request->product,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'setting' => $request->setting,
            'blog' => $request->blog,
            'returnorder' => $request->returnorder,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'adminuserrole' => $request->adminuserrole,
            ]);
            $notification = array(
                'message' => 'Admin User Updated Without Image Successfully',
                'alert-type' => 'info'  
            );
    
            return redirect()->route('all.admin.users')->with($notification);
        }
    }

    public function DeleteAdminRole($id){

        $admin = Admin::findOrFail($id);
        unlink($admin->profile_photo_path);
        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'info'  
        );

        return redirect()->route('all.admin.users')->with($notification);
    }
}

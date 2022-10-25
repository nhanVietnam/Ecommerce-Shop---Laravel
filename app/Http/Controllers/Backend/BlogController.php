<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function BlogCategory(){
        $blogCategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view',compact('blogCategory'));
    }

    public function BlogCategoryStore(Request $request){
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_vn' => 'required',
        ],[
            'blog_category_name_en.required'=>'Vui lòng không để trống',
            'blog_category_name_vn.required'=>'Vui lòng không để trống',
        ]);
        
        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_vn' => $request->blog_category_name_vn,
            'blog_category_slug_en' => Str::slug($request->input('blog_category_name_en', '-')),
            'blog_category_slug_vn' => Str::slug($request->input('blog_category_name_vn', '-')),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Insert Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function BlogCategoryEdit($id){
        $blogCategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit',compact('blogCategory'));
    }

    public function BlogCategoryUpdate(Request $request){
        $blog_id = BlogPostCategory::findOrFail($request->id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_vn' => $request->blog_category_name_vn,
            'blog_category_slug_en' => Str::slug($request->input('blog_category_name_en', '-')),
            'blog_category_slug_vn' => Str::slug($request->input('blog_category_name_vn', '-')),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->route('blog.category')->with($notification);
    }

    public function ListBlogPost(){
        $blogpost = BlogPost::with('category')->latest()->get();
        // dd($blogpost);
        return view('backend.blog.post.post_list',compact('blogpost'));
    }

    public function AddBlogPost(){
        $blogCategory = BlogPostCategory::latest()->get();  
        $blogpost = BlogPost::latest()->get();
        // dd($blogpost);
        return view('backend.blog.post.post_add',compact('blogpost','blogCategory'));
    }

    public function BlogPostStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'post_title_vn' => 'required',
            'post_title_en' => 'required',
            'post_image' => 'required',
        ],[
            'category_id.required'=>'Vui lòng nhập không bỏ trống',
            'post_title_vn.required'=>'Vui lòng nhập không bỏ trống',
            'post_title_en.required'=>'Vui lòng nhập không bỏ trống',
            'post_image.required'=>'Vui lòng thêm ảnh Đại diện',
        ]);
        
        $image = $request->file('post_image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('upload/post/'.$name_generate);
        $save_url = 'upload/post/'.$name_generate;
        
        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_vn' => $request->post_title_vn,
            'post_title_en' => $request->post_title_en,
            'post_slug_en' => Str::slug($request->input('post_title_en', '-')),
            'post_slug_vn' => Str::slug($request->input('post_title_vn', '-')),
            'post_short_detail_vn' => $request->post_short_detail_vn,
            'post_short_detail_en' => $request->post_short_detail_en,
            'post_detail_vn' => $request->post_detail_vn,
            'post_detail_en' => $request->post_detail_en,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->route('list.post')->with($notification);
    }
}

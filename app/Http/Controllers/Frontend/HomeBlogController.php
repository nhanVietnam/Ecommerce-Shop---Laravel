<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function AddBlogPost(){
        $blogcategory = BlogPostCategory::latest()->get();
        // dd($blogcategory);
        $blogpost = BlogPost::latest()->get();
        return view('frontend.blog.blog_list',compact('blogcategory','blogpost'));
    }

    public function DetailsBlogPost($slug,$id){
        // dd($id);
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details',compact('blogpost','blogcategory'));
    }

    public function HomeBlogCategoryPost($id){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::where('category_id',$id)->orderBy('id','DESC')->get();
        return view('frontend.blog.blog_cate_list',compact('blogpost','blogcategory'));
    }
}

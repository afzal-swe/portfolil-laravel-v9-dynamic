<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    // __Blog  Manage Function__ //
    public function index()
    {
        $blog_category = BlogCategory::all();
        $blog = Blog::all();
        return view('admin.blog_section.index', compact('blog', 'blog_category'));
    }
    // __End Method


    // __Blog  Manage Function__ //
    public function create()
    {
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog_section.create', compact('blog_category'));
    }
    // __End Method


    // __Blog  Manage Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required',
        ]);

        $img = $request->file('blog_image');

        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

        Image::make($img)->resize(430, 327)->save("image/blog/" . $name_gen);

        $save_img_url = "image/blog/" . $name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_slug' => Str::of($request->blog_title)->slug('-'),
            'blog_image' => $save_img_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'messege' => 'New Blog Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.index')->with($notification);
    }
    // __End Method


    // __Blog  Delete Function__ //
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image; // Multi_image come to the database Fild name.

        unlink($img);
        Blog::findOrFail($id)->delete();

        $notification = array(
            'messege' => 'Portfolio Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // __End Method
}

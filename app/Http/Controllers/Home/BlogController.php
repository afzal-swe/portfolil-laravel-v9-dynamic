<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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


    // __Blog  Create Function__ //
    public function create()
    {
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog_section.create', compact('blog_category'));
    }
    // __End Method


    // __Blog  Store Function__ //
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


    // __Blog  Edit Function__ //
    public function edit($id)
    {
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $edit = Blog::findOrFail($id);
        return view('admin.blog_section.edit', compact('edit', 'blog_category'));
    }
    // __End Method


    // __Blog  Update Function__ //
    public function update(Request $request)
    {
        $blog_id = $request->id;


        if ($request->file('blog_image')) {
            $file = $request->file('blog_image');

            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(430, 327)->save('image/blog/' . $name_gen);

            $save_url = 'image/blog/' . $name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_slug' => Str::of($request->blog_title)->slug('-'),
                'blog_image' => $save_url,

            ]);
            $notification = array(
                'messege' => 'Blog Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.index')->with($notification);
        } else {
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_slug' => Str::of($request->blog_title)->slug('-'),
            ]);
            $notification = array(
                'messege' => 'Blog Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.index')->with($notification);
        }
    }
    // __End Method

    // __Blog  Manage Function__ //
    public function view($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog_section.view', compact('blog'));
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

    // Frontend Manage Function::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // __Blog  Blog Details Function__ //
    public function details($id)
    {
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allblog = Blog::latest()->limit(5)->get();
        $blog = Blog::findOrFail($id);
        return view('frontend.blog_section.blog_details', compact('blog', 'allblog', 'blog_category'));
    }
    // __End Method details


    // __Blog  All Blog Function__ //
    public function categoryBlog($id)
    {
        $blog_post = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allblog = Blog::latest()->limit(5)->get();
        $tags = BlogCategory::latest()->get();
        $category_name = BlogCategory::findOrFail($id);
        return view('frontend.blog_section.category_blog', compact('blog_post', 'blog_category', 'allblog', 'tags', 'category_name'));
    }
    // __End Method details


    // __Blog  Nav Blog Function__ //
    public function HomeBlog()
    {
        $allblogs = Blog::latest()->get();
        $blog_category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog_section.home_blog', compact('allblogs', 'blog_category'));
    }
    // __End Method details
}

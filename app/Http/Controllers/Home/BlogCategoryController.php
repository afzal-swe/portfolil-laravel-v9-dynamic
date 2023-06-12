<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;

class BlogCategoryController extends Controller
{
    // __Blog Category Manage Function__ //
    public function index()
    {
        $blog_category = BlogCategory::all();
        return view('admin.blog_category.index', compact('blog_category'));
    }
    // __End Method


    // __Blog Category Create Function__ //
    public function create()
    {
        return view('admin.blog_category.create');
    }
    // __End Method


    // __Blog Category store Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'blog_category' => 'required',
        ], [
            'blog_category' => 'The Blog Category Not Type',
        ]);

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'messege' => 'New Blog Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog_category.index')->with($notification);
    }
    // __End Method


    // __Blog Category Edit Function__ //
    public function edit($id)
    {
        $edit = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit', compact('edit'));
    }
    // __End Method


    // __Blog Category Update Function__ //
    public function update(Request $request)
    {
        $blog_category_id = $request->id;

        BlogCategory::findOrFail($blog_category_id)->update([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'messege' => 'Blog Category Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog_category.index')->with($notification);
    }
    // __End Method

    // __Blog Category Delete Function__ //
    public function destroy($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'messege' => 'Blog Category Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // __End Method
}

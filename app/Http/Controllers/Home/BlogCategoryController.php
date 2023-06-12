<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    // __Blog Category Manage Function__ //
    public function index()
    {
        $blog_category = BlogCategory::all();
        return view('admin.blog_category.index', compact('blog_category'));
    }
    // __End Method
}

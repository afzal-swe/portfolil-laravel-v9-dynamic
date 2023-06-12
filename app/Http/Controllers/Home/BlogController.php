<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // __Blog  Manage Function__ //
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog_section.index', compact('blog'));
    }
    // __End Method
}

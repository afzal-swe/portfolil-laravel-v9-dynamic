<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footerData = Footer::all();
        return view('admin.footer_section.index', compact('footerData'));
    }
}

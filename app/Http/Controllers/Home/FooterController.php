<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    // __Footer Manage Method__ //
    public function index()
    {
        $footerData = Footer::all();
        return view('admin.footer_section.index', compact('footerData'));
    }
    // End Method


    // __Footer Create Method__ //
    public function create()
    {

        return view('admin.footer_section.create');
    }
    // End Method


    // __Footer Store Method__ //
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'address' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
        ]);

        Footer::insert([
            'number' => $request->number,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'messege' => 'New Footer Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('footer.index')->with($notification);
    }
    // End Method


}

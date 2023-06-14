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
            'short_description' => $request->short_description,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'New Footer Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('footer.index')->with($notification);
    }
    // End Method


    // __Footer Edit Method__ //
    public function edit($id)
    {
        $edit = Footer::findOrFail($id);
        return view('admin.footer_section.edit', compact('edit'));
    }
    // End Method


    // __Footer Update Method__ //
    public function update(Request $request)
    {
        $update_footer = $request->id;

        Footer::findOrFail($update_footer)->update([
            'number' => $request->number,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'short_description' => $request->short_description,
            'copyright' => $request->copyright,

        ]);
        $notification = array(
            'message' => 'Footer Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('footer.index')->with($notification);
    }
    // End Method

    // __Footer View Method__ //
    public function view($id)
    {
        $view = Footer::findOrFail($id);
        return view('admin.footer_section.view', compact('view'));
    }
    // End Method

    // __Footer Delete Method__ //
    public function destroy($id)
    {
        Footer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Footer Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // End Method
}

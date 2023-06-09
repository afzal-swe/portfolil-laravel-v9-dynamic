<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    // __Contact Manage Method__ //
    public function index()
    {
        $all_message_info = Contact::all();
        return view('admin.contact_section.index', compact('all_message_info'));
    }
    // End Method


    // __View Single Message Method__ //
    public function view($id)
    {
        $single_message_view = Contact::findOrFail($id);
        return view('admin.contact_section.view', compact('single_message_view'));
    }
    // End Method


    // __Delete Single Message Method__ //
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // End Method




    //__Frontend Start::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // __Contact Manage Method__ //
    public function create()
    {
        return view('frontend.contact_section.index');
    }
    // End Method

    // __Store Massage Method__ //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Submit Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // End Method
    //__Frontend End::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
}

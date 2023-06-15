<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{
    // __Message Manage Method__ //
    public function index()
    {
        $message = Message::all();
        return view('admin.footer_contact.index', compact('message'));
    }
    // End Method

    // __View Single Message Method__ //
    public function view($id)
    {
        $view_message = Message::findOrFail($id);
        return view('admin.footer_contact.view', compact('view_message'));
    }
    // End Method

    // __Delete Single Message Method__ //
    public function destroy($id)
    {
        Message::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // End Method


    // __Store Massage Method__ //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Message::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Message Send Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // End Method
    //__Frontend End::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
}

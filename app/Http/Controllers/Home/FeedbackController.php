<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // __Feedback Manage Method__ //
    public function index()
    {
        $feedbackData = Feedback::all();
        return view('admin.client_feedback_section.index', compact('feedbackData'));
    }
    // End Method


    // __Feedback Manage Method__ //
    public function create()
    {
        return view('admin.client_feedback_section.create');
    }
    // End Method


    // __Store Manage Method__ //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'short_title' => 'required',
        ]);

        Feedback::insert([
            'name' => $request->name,
            'title' => $request->title,
            'short_title' => $request->short_title,
        ]);

        $notification = array(
            'message' => 'Add Feedback Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('feedback.index')->with($notification);
    }
    // End Method

    // __Edit Manage Method__ //
    public function edit($id)
    {
        $edit = Feedback::findOrFail($id);
        return view('admin.client_feedback_section.edit', compact('edit'));
    }
    // End Method


    // __Edit Manage Method__ //
    public function update(Request $request)
    {
        $update = $request->id;

        Feedback::findOrFail($update)->update([
            'name' => $request->name,
            'title' => $request->title,
            'short_title' => $request->short_title,
        ]);

        $notification = array(
            'message' => 'Feedback Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('feedback.index')->with($notification);
    }
    // End Method


    // __View Manage Method__ //
    public function view($id)
    {
        $feedbackView = Feedback::findOrFail($id);
        return view('admin.client_feedback_section.view', compact('feedbackView'));
    }
    // End Method

    // __Delete Manage Method__ //
    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Feedback Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // End Method
}

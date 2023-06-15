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


    // __View Manage Method__ //
    public function view($id)
    {
        $feedbackView = Feedback::findOrFail($id);
        return view('admin.client_feedback_section.view', compact('feedbackView'));
    }
    // End Method
}

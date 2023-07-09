<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkingProcess;

class WorkingController extends Controller
{

    public function index()
    {
        $working = WorkingProcess::all();
        return view('admin.work_process_section.index', compact('working'));
    }

    public function create()
    {
        return view('admin.work_process_section.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        WorkingProcess::insert([
            'title' => $request->title,
            'description' => $request->description,

        ]);

        $notification = array('message' => 'Add Working Process Successfully', 'alert-type' => 'success');
        return redirect()->route('working.index')->with($notification);
    }

    public function view($id)
    {
        $view = WorkingProcess::findOrFail($id);
        return view('admin.work_process_section.view', compact('view'));
    }

    public function destroy($id)
    {

        WorkingProcess::findOrFail($id)->delete();
        $notification = array('message' => ' Working Process Delete Successfully', 'alert-type' => 'success');
        return redirect()->route('working.index')->with($notification);
    }
}

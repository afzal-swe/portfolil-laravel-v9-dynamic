<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkingGroup;


class WorkingGroupController extends Controller
{
    public function edit()
    {
        $working = WorkingGroup::find(1);

        return view('admin.partners_section.update', compact('working'));
    }

    public function update(Request $request)
    {
        $update = $request->id;

        WorkingGroup::findOrFail($update)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $notification = array('message' => ' Working Group Update Successfully', 'alert-type' => 'success');
        return redirect()->route('group.edit')->with($notification);
    }
}

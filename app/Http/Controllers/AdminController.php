<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');

        // End method //
    }


    //__ Admin Profile Route __//
    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.profile.view', compact('adminData'));
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.profile.edit', compact('editData'));
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->file('image')) {
            $file = $request->file('image');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/admin_image'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('admin.profile');
    }
}

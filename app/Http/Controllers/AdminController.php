<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array('messege' => 'User Logout Successfully!', 'alert-type' => 'success');

        return redirect('/login')->with($notification);;

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

            @unlink(public_path('image/admin_image/' . $data->image)); //replece this image

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/admin_image'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('admin.profile.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',

        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->new_password);
            $users->save();

            $notification = array(
                'messege' => 'Password Update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            session()->flash('message', 'Old Password is not match!');
            return redirect()->back();
        }
    }
}

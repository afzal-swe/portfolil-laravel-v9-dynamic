<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    // __Portfolio Delete Function__ //
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $img = $user->image; // Multi_image come to the database Fild name.

        // unlink($img);
        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // __End Method__ //
}

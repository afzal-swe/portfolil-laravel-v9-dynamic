<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class ServicesController extends Controller
{
    public function index()
    {

        $services = Services::all();
        return view('admin.services_section.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services_section.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'logn_description' => 'required',
            'image' => 'required',
        ]);
        $img = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

        Image::make($img)->resize(323, 240)->save("image/services/" . $name_gen);

        $save_img_url = "image/services/" . $name_gen;

        Services::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'logn_description' => $request->logn_description,
            'image' => $save_img_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array('message' => 'New Serveces Added Successfully', 'alert-type' => 'success');
        return redirect()->route('services.index')->with($notification);
    }

    public function destroy($id)
    {
        $Services = Services::findOrFail($id);
        $img = $Services->image; // Multi_image come to the database Fild name.

        if ($img == NULL) {
            Services::findOrFail($id)->delete();

            $notification = array(
                'message' => 'This Services Delete Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            unlink($img);
            Services::findOrFail($id)->delete();

            $notification = array(
                'message' => 'This Services Delete Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}

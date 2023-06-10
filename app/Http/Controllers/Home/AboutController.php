<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $About = About::find(1);
        return view('admin.about.about', compact('About'));
    }

    public function UpdateAbout(Request $request)
    {

        $about_id = $request->id;


        if ($request->file('about_image')) {
            $file = $request->file('about_image');

            // $filename = date('YmdHi') . $file->getClientOriginalName();
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(749, 467)->save('image/about_image/' . $name_gen);

            $save_url = 'image/about_image/' . $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_Description' => $request->short_Description,
                'logn_Description' => $request->logn_Description,
                'about_image' =>  $save_url,

            ]);
            $notification = array(
                'messege' => 'Home Slider Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_Description' => $request->short_Description,
                'logn_Description' => $request->logn_Description,

            ]);
            $notification = array(
                'messege' => 'Home Slider Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function HomeAbout()
    {
        $about_page = About::find(1);
        return view('frontend.about.about_page', compact('about_page'));
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    // Home function working this home page
    public function home()
    {
        return view('frontend.index');
    }

    public function HomeSlider()
    {
        $homeSlide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeSlide'));
    }

    public function UpdateProfile(Request $request)
    {

        $slide_id = $request->id;


        if ($request->file('home_slide')) {
            $file = $request->file('home_slide');

            @unlink(public_path('image/home_image/' . $slide_id->home_slide)); //replece this image
            // $filename = date('YmdHi') . $file->getClientOriginalName();
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(636, 852)->save('image/home_image/' . $name_gen);

            $save_url = 'image/home_image/' . $name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' =>  $save_url,

            ]);
            $notification = array(
                'message' => 'Home Slider Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,

            ]);
            $notification = array(
                'message' => 'Home Slider Update Without image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{


    // Backend Code..................................................................................................................



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
    public function AboutMultiImage()
    {

        return view('admin.about.multi_image');
    }
    public function StoreMultiImage(Request $request)
    {

        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {

            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(749, 467)->save('image/multi/' . $name_gen);

            $save_url = 'image/multi/' . $name_gen;

            MultiImage::insert([

                'multi_image' =>  $save_url,
                'created_at' =>  Carbon::now(),

            ]);
        } // End of the foreach
        $notification = array(
            'messege' => 'Multi Image Upload Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.multi.image')->with($notification);
    }

    public function AllMultiImage()
    {
        $allMultiImage = MultiImage::all();
        return view('admin.about.all_multi_image', compact('allMultiImage'));
    }
    public function EditMultiImage($id)
    {
        $editMultiImage = MultiImage::findOrFail($id);
        return view('admin.about.edit_multi_image', compact('editMultiImage'));
    }

    public function UpdateMultiImage(Request $request)
    {
        $multi_image_id = $request->id;


        if ($request->file('multi_image')) {
            $file = $request->file('multi_image');

            // $filename = date('YmdHi') . $file->getClientOriginalName();
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(749, 467)->save('image/multi/' . $name_gen);

            $save_url = 'image/multi/' . $name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                // 'title' => $request->title,
                // 'short_title' => $request->short_title,
                // 'short_Description' => $request->short_Description,
                // 'logn_Description' => $request->logn_Description,
                'multi_image' =>  $save_url,

            ]);
            $notification = array(
                'messege' => 'Multi Image Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.multi.image')->with($notification);
        }
    }

    public function destroy($id)
    {
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image; // Multi_image come to the database Fild name.

        unlink($img);
        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'messege' => 'Multi Image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Frontend Code..................................................................................................................
    public function HomeAbout()
    {
        $about_page = About::find(1);
        return view('frontend.about.about_page', compact('about_page'));
    }
}

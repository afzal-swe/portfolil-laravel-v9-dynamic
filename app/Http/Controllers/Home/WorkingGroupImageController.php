<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Multi_image_partner;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class WorkingGroupImageController extends Controller
{
    // Image Section
    public function create()
    {
        return view('admin.partners_section.working_multi_image');
    }

    public function store(Request $request)
    {

        //     $image = $request->file('multi_image');

        //     foreach ($image as $multi_image) {

        //         $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

        //         Image::make($multi_image)->resize(749, 467)->save('image/services_multi_image/' . $name_gen);

        //         $save_url = 'image/services_multi_image/' . $name_gen;

        //         Multi_image_partner::insert([

        //             'multi_image' =>  $save_url,
        //             'created_at' =>  Carbon::now(),

        //         ]);
        //     } // End of the foreach
        //     $notification = array(
        //         'message' => 'Multi Image Upload Successfully',
        //         'alert-type' => 'success'
        //     );
        //     return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    // __Portfolio Manage Function__ //
    public function index()
    {
        $allportfolio = Portfolio::all();
        return view('admin.portfolio_section.index', compact('allportfolio'));
    }
    // __End Method__ //


    // __Portfolio Create Form Function__ //
    public function create()
    {
        return view('admin.portfolio_section.create');
    }
    // __End Method__ //


    // __Portfolio Store Function__ //
    public function store(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'portfolio_image' => 'required',
        ], [
            'portfolio_name' => 'Portfolio Name is Required',
            'portfolio_title' => 'Portfolio Title is Required',
        ]);

        $file = $request->file('portfolio_image');

        // $filename = date('YmdHi') . $file->getClientOriginalName();
        $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

        Image::make($file)->resize(1020, 519)->save('image/portfolio/' . $name_gen);

        $save_url = 'image/portfolio/' . $name_gen;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' =>  $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'messege' => 'New Portfolio Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('portfolio.index')->with($notification);
    }
    // __End Method__ //

    // __Portfolio Delete Function__ //
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image; // Multi_image come to the database Fild name.

        unlink($img);
        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'messege' => 'Portfolio Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // __End Method__ //
}

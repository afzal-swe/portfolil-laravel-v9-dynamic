<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

use function Ramsey\Uuid\v1;

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
        ], [
            'portfolio_name' => 'Portfolio Name is Required',
            'portfolio_title' => 'Portfolio Title is Required',
        ]);

        if ($request->file('portfolio_image')) {

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
                'message' => 'New Portfolio Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio.index')->with($notification);
        } else {
            Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'New Portfolio Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio.index')->with($notification);
        }
    }
    // __End Method__ //

    // __Portfolio Edit Function__ //
    public function edit($id)
    {
        $edit = Portfolio::findOrFail($id);
        return view('admin.portfolio_section.edit', compact('edit'));
    }
    // __End Method__ //

    // __Portfolio update Function__ //
    public function update(Request $request)
    {
        $portfolio_id = $request->id;


        if ($request->file('portfolio_image')) {
            $file = $request->file('portfolio_image');

            // $filename = date('YmdHi') . $file->getClientOriginalName();
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(1020, 519)->save('image/portfolio/' . $name_gen);

            $save_url = 'image/portfolio/' . $name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' =>  $save_url,

            ]);
            $notification = array(
                'message' => 'Portfolio Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio.index')->with($notification);
        } else {
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,

            ]);
            $notification = array(
                'message' => 'Portfolio Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio.index')->with($notification);
        }
    }
    // __End Method__ //


    // __Portfolio View Function__ //
    public function view($id)
    {
        $view = Portfolio::find($id);
        return view('admin.portfolio_section.view', compact('view'));
    }
    // __End Method__ //

    // __Portfolio Delete Function__ //
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image; // Multi_image come to the database Fild name.
        if ($img == Null) {

            Portfolio::findOrFail($id)->delete();

            $notification = array('message' => 'Portfolio Delete Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            unlink($img);
            Portfolio::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Portfolio Delete Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    // __End Method__ //

    // __Frontend...................................................................................................
    // __Portfolio Home Page Function__ //
    public function Home()
    {
        $portfolio = Portfolio::all();
        return view('frontend.portfolio_section.home', compact('portfolio'));
    }
    // __End Method__ //


    // __Portfolio Details Function__ //
    public function details($id)
    {
        $details = Portfolio::findOrFail($id);
        return view('frontend.portfolio_section.details', compact('details'));
    }
    // __End Method__ //


}

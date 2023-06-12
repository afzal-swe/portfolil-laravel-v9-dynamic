<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Models\Portfolio;
use Illuminate\Http\Request;

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
}

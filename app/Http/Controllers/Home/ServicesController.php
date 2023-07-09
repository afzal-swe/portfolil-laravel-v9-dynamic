<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function index()
    {

        $services = Services::all();
        return view('admin.services_section.index', compact('services'));
    }
}

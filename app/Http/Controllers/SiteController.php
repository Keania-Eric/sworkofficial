<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //

    public function home()
    {
        return view('index');
    }

    public function tour()
    {
        return view('product.tour');
    }

    public function pricing()
    {
        return view('product.pricing');
    }

    public function status()
    {
        return view('product.status');
    }

    public function projectManagement()
    {
        return view('solutions.project-m');
    }

    public function contact()
    {
        return view('contact');
    }


    public function apiDocs()
    {
        return view('api-docs');
    }
}

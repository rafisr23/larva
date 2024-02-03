<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function about()
    {
        return view('frontend.home.about');
    }

    public function services()
    {
        return view('frontend.home.services');
    }

    public function projects()
    {
        return view('frontend.home.projects');
    }

    public function contact()
    {
        return view('frontend.home.contact');
    }
}
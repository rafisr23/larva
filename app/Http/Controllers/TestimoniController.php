<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $title = 'LARVA | Testimoni';
        return view('admin.testimoni.index', compact('title'));
    }
}
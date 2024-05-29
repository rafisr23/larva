<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('frontend.blog.index', compact('contact'));
    }

    public function show()
    {
        $contact = Contact::first();
        return view('frontend.blog.show', compact('contact'));
    }
}
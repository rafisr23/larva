<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $contact = Contact::first();
        return view('frontend.blog.index', compact('contact'));
    }

    public function show() {
        $contact = Contact::first();
        return view('frontend.blog.show', compact('contact'));
    }

    public function list() {
        $title = 'LARVA | Blog';

        return view('admin.blog.index', compact('title'));
    }

    public function getBlogs() {
        $blogs = Blog::with(['category', 'tags', 'user', 'images'])->get();
        return response()->json($blogs);
    }
}
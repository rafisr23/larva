<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\BlogCategories;
use Cviebrock\EloquentSluggable\Services\SlugService;

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

    public function create() {
        $title = 'LARVA | Create Blog';

        $categories = BlogCategories::all();
        $tags = Tag::all();

        return view('admin.blog.create', compact('title', 'categories', 'tags'));
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title ?? '');
        return response()->json(['slug' => $slug]);
    }

    public function store(Request $request) {
        return $request->all();
    }
}
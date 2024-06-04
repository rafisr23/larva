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
        $blogs = Blog::with(['category', 'tags', 'user', 'images'])->orderBy('created_at', 'desc')->get();
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
        
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            // 'tag_id' => 'required',
            'content' => 'required',
            // 'status' => 'required',
            // 'meta_title' => 'required',
            // 'slug' => 'required',
            // 'meta_author' => 'required',
            // 'meta_keyword' => 'required',
            // 'meta_description' => 'required',
        ]);
        
        // return $request->all();

        $decCategoryId = decrypt($request->category_id);

        $blog = Blog::create([
            'title' => $request->title,
            'category_id' => $decCategoryId,
            'content' => $request->content,
            'thumbnail_image' => 'default-thumbnail.jpg',
            'header_image' => 'default-header.jpg',
            'status' => $request->status == 'on' ? 'published' : 'draft',
            'meta_title' => $request->meta_title,
            'slug' => $request->slug,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'user_id' => auth()->id(),
            'published_at' => $request->published_at ?? now(),
        ]);

        if ($request->hasFile('blog_thumbnail')) {
            $request->validate([
                'blog_thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            $image = $request->file('blog_thumbnail');
            $imageName = $blog->slug . '-thumbnail' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('blog/thumbnail', $imageName);
            
            $blog->update([
                'blog_thumbnail' => $file_path,
            ]);
        }

        if ($request->hasFile('blog_header')) {
            $request->validate([
                'blog_header' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            $image = $request->file('blog_header');
            $imageName = $blog->slug . '-header' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('blog/header', $imageName);
            
            $blog->update([
                'blog_header' => $file_path,
            ]);
        }

        $decTagId = [];
        foreach ($request->tag_id as $tag) {
            $decTagId[] = decrypt($tag);
        }

        $blog->tags()->attach($decTagId);

        return redirect()->route('admin.blog.list')->with('success', 'Blog created successfully');
    }
}
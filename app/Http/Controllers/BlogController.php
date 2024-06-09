<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\BlogCategories;
use App\Models\HeaderPageImage;
use App\Models\PageImageCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BlogController extends Controller
{
    public function index() {
        $contact = Contact::first();

        $blogs = Blog::latest()->Filter(request(['search', 'category', 'user', 'tag']))->paginate(9)->withQueryString();

        $categoryImage = PageImageCategory::where('category_name', 'blog-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();

        if ($headerImage->isEmpty()) {
            $headerImage = null;
        }

        return view('frontend.blog.index', compact('contact', 'headerImage', 'blogs'));
    }

    public function show(Blog $blog) {
        $blog->load(['category', 'tags', 'user', 'images']);
        $contact = Contact::first();
        $latestBlogs = Blog::with(['category', 'tags', 'user', 'images'])->orderBy('created_at', 'desc')->take(3)->get();
        $categories = BlogCategories::all();
        $tags = Tag::all();

        return view('frontend.blog.show', compact('contact', 'blog', 'latestBlogs', 'categories', 'tags'));
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
            'thumbnail_image' => null,
            'header_image' => null,
            'status' => $request->status == 'on' ? 'published' : 'draft',
            'meta_title' => $request->meta_title,
            'slug' => $request->slug,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'user_id' => auth()->id(),
            'published_at' => $request->published_at ?? now(),
        ]);

        if ($request->hasFile('thumbnail_image')) {
            $request->validate([
                'thumbnail_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            $image = $request->file('thumbnail_image');
            $imageName = $blog->slug . '-thumbnail' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('blog/thumbnail', $imageName);
            
            $blog->update([
                'thumbnail_image' => $file_path,
            ]);
        }

        if ($request->hasFile('header_image')) {
            $request->validate([
                'header_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            $image = $request->file('header_image');
            $imageName = $blog->slug . '-header' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('blog/header', $imageName);
            
            $blog->update([
                'header_image' => $file_path,
            ]);
        }

        $decTagId = [];
        foreach ($request->tag_id as $tag) {
            $decTagId[] = decrypt($tag);
        }

        $blog->tags()->attach($decTagId);

        return redirect()->route('admin.blog.list')->with('success', 'Blog created successfully');
    }

    public function edit(Blog $blog) {
        $title = 'LARVA | Edit Blog';

        $categories = BlogCategories::all();
        $tags = Tag::all();

        return view('admin.blog.edit', compact('title', 'categories', 'tags', 'blog'));
    }

    public function update(Request $request, Blog $blog) {
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

        $decCategoryId = decrypt($request->category_id);

        $blog->update([
            'title' => $request->title,
            'category_id' => $decCategoryId,
            'content' => $request->content,
            'status' => $request->status == 'on' ? 'published' : 'archived',
            'meta_title' => $request->meta_title,
            'slug' => $request->slug,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'user_id' => auth()->id(),
            'published_at' => $request->published_at ?? now(),
        ]);

        if ($request->hasFile('thumbnail_image')) {
            $request->validate([
                'thumbnail_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            if ($blog->thumbnail_image) {
                if (public_path('storage/' . $blog->thumbnail_image) == '') {
                    unlink(public_path('storage/' . $blog->thumbnail_image));
                }
            }

            $image = $request->file('thumbnail_image');
            $imageName = $blog->slug . '-thumbnail' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('blog/thumbnail', $imageName);
            
            $blog->update([
                'thumbnail_image' => $file_path,
            ]);
        }

        if ($request->hasFile('header_image')) {
            $request->validate([
                'header_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            if ($blog->header_image) {
                if (public_path('storage/' . $blog->header_image) == '') {
                    unlink(public_path('storage/' . $blog->header_image));
                }
            }

            $image = $request->file('header_image');
            $imageName = $blog->slug . '-header' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('blog/header', $imageName);
            
            $blog->update([
                'header_image' => $file_path,
            ]);
        }

        $decTagId = [];
        foreach ($request->tag_id as $tag) {
            $decTagId[] = decrypt($tag);
        }

        $blog->tags()->sync($decTagId);

        return redirect()->route('admin.blog.list')->with('success', 'Blog updated successfully');
    }

    public function destroy(Blog $blog) {
        $blog->tags()->detach();

        // delete image from storage
        if ($blog->thumbnail_image) {
            // check if image in exist in storage
            if (public_path('storage/' . $blog->header_image) == '') {
                unlink(public_path('storage/' . $blog->thumbnail_image));
            }
        }

        if ($blog->header_image) {
            // check if image in exist in storage
            if (public_path('storage/' . $blog->header_image) == '') {
                unlink(public_path('storage/' . $blog->header_image));
            }
        }
        
        $blog->delete();

        return response()->json([
            'success' => TRUE,
            'message' => 'Service deleted successfully.',
        ]);
    }
        
}
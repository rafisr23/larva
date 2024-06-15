<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BlogTagController extends Controller
{
    public function index() {
        $title = ' LARVA | Blog Tag';
        return view('admin.blog-tag.index', compact('title'));
    }

    public function getTags() {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $tag = Tag::create([
            'name'          => $request->name,
            'slug'          => SlugService::createSlug(Tag::class, 'slug', $request->name),
        ]);

        return redirect()->route('admin.blog-tag.index')->with('success', 'Tag created successfully!');
    }

    public function getTag(Tag $tag) {
        return response()->json($tag);
    }

    public function update(Request $request, Tag $tag) {
        $request->validate([
            'name' => 'required',
        ]);

        $slug = $tag->name != $request->name ? SlugService::createSlug(Tag::class, 'slug', $request->name) : $tag->slug;

        $tag->update([
            'name'          => $request->name,
            'slug'          => $slug,
        ]);

        return redirect()->route('admin.blog-tag.index')->with('success', 'Tag updated successfully!');
    }

    public function destroy(Tag $tag) {
        $tag->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blog tag deleted successfully.',
        ]);
    }
}
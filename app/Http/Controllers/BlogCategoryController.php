<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategories;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BlogCategoryController extends Controller
{
    public function index() {
        $title = ' LARVA | Blog Category';
        return view('admin.blog-category.index', compact('title'));
    }

    public function getCategories() {
        $categories = BlogCategories::all();
        return response()->json($categories);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $category = BlogCategories::create([
            'name'          => $request->name,
            'slug'          => SlugService::createSlug(BlogCategories::class, 'slug', $request->name),
            'description'   => $request->description,
        ]);

        return redirect()->route('admin.blog-category.index')->with('success', 'Category created successfully!');
    }

    public function getCategory(BlogCategories $category) {
        return response()->json($category);
    }

    public function update(Request $request, BlogCategories $category) {
        $request->validate([
            'name' => 'required',
        ]);

        $slug = $category->name != $request->name ? SlugService::createSlug(BlogCategories::class, 'slug', $request->name) : $category->slug;

        $category->update([
            'name'          => $request->name,
            'slug'          => $slug,
            'description'   => $request->description,
        ]);

        return redirect()->route('admin.blog-category.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(BlogCategories $category) {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blog category deleted successfully.',
        ]);
    }
}
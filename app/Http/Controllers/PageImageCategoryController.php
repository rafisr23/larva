<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageImageCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PageImageCategoryController extends Controller
{
    public function index()
    {
        $title = ' LARVA | Image Category';
        return view('admin.image-category.index', compact('title'));
    }

    public function getImageCategories()
    {
        $categories = PageImageCategory::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);

        $imageCategory = PageImageCategory::create([
            'category_name' => $request->category,
            'slug'          => SlugService::createSlug(PageImageCategory::class, 'slug', $request->category),
            'is_active'     => $request->is_active == 'on' ? '1' : '0',
        ]);

        return redirect()->route('admin.image-category.index')->with('success', 'Category created successfully!');
    }

    public function getOne(PageImageCategory $imageCategory)
    {
        return response()->json($imageCategory);
    }

    public function update(Request $request, PageImageCategory $imageCategory)
    {
        $request->validate([
            'category' => 'required',
        ]);

        $slug = $imageCategory->category_name != $request->category ? SlugService::createSlug(PageImageCategory::class, 'slug', $request->category) : $imageCategory->slug;

        $imageCategory->update([
            'category_name' => $request->category,
            'slug'          => SlugService::createSlug(PageImageCategory::class, 'slug', $request->category),
            'is_active'     => $request->is_active == 'on' ? '1' : '0',
        ]);

        return redirect()->route('admin.image-category.index')->with('success', 'Category updated successfully!');
    }

    public function updateStatus(Request $request, PageImageCategory $imageCategory)
    {
        $imageCategory->update([
            'is_active' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category status updated successfully.',
        ]);
    }

    public function destroy(PageImageCategory $imageCategory)
    {
        $imageCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ]);
    }


    
}
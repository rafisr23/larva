<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderPageImage;
use App\Models\PageImageCategory;

class HeaderPageImageController extends Controller
{
    public function index()
    {
        $title = 'LARVA | Header Page Image';
        $categories = PageImageCategory::all();
        
        return view('admin.page-image.index', compact('title', 'categories'));
    }

    public function getHeaderPageImages()
    {
        $images = HeaderPageImage::with('category')->orderBy('page_image_category_id', 'asc')->get();

        foreach ($images as $image) {
            $image->encId = encrypt($image->id);
        }

        return response()->json($images);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'page_image.*' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $category = PageImageCategory::find(decrypt($request->category_id));

        foreach ($request->file('page_image') as $key => $image) {
            $imageName = $category->category_name . '-' . $key . time() . '.' . $image->extension();
            $file_path = $image->storeAs('page-image', $imageName);

            $pageImage = HeaderPageImage::create([
                'page_image_category_id'    => decrypt($request->category_id),
                'is_active'                 => $request->is_active == 'on' ? '1' : '0',
                'file_path'                 => $file_path,
            ]);
        }

        return redirect()->route('admin.page-image.index')->with('success', 'Header Page Image created successfully.');
    }

    // destroy
    public function destroy(Request $request)
    {
        $headerPageImage = HeaderPageImage::find(decrypt($request->id));

        if (file_exists(public_path('storage/' .$headerPageImage->file_path))) {
            unlink(public_path('storage/' .$headerPageImage->file_path));
        }
        $headerPageImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully.',
        ]);
    }

    public function getOne(Request $request)
    {
        $headerPageImage = HeaderPageImage::find(decrypt($request->id))->with('category')->first();
        $categories = PageImageCategory::all();

        $headerPageImage->encCategoryId = encrypt($headerPageImage->page_image_category_id);

        return response()->json([
            'headerPageImage' => $headerPageImage,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'page_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $headerPageImage = HeaderPageImage::find(decrypt($request->id));

        if (($request->category_old_id != $request->category_id) && $request->category_id != null) {
            $headerPageImage->page_image_category_id = decrypt($request->category_id);
        } else {
            $headerPageImage->page_image_category_id = $request->category_old_id;
        }

        $headerPageImage->page_image_category_id = decrypt($request->category_id);
        $headerPageImage->is_active = $request->is_active == 'on' ? '1' : '0';

        if ($request->hasFile('page_image')) {
            if (file_exists(public_path('storage/' .$headerPageImage->file_path))) {
                unlink(public_path('storage/' .$headerPageImage->file_path));
            }

            $imageName = $headerPageImage->category->category_name . '-' . time() . '.' . $request->page_image[0]->extension();
            $file_path = $request->page_image[0]->storeAs('page-image', $imageName);

            $headerPageImage->file_path = $file_path;
        }

        $headerPageImage->save();

        return redirect()->route('admin.page-image.index')->with('success', 'Header Page Image updated successfully.');
    }

    public function updateStatus(Request $request)
    {
        $headerPageImage = HeaderPageImage::find(decrypt($request->id));

        // $allImages = HeaderPageImage::where('page_image_category_id', $headerPageImage->page_image_category_id)
        //     ->where('id', '!=', $headerPageImage->id)
        //     ->get();
            
        // foreach ($allImages as $image) {
        //     $image->is_active = 0;
        //     $image->save();
        // }

        $headerPageImage->is_active = $request->status;
        $headerPageImage->save();

        return response()->json([
            'success' => true,
            'message' => 'Header Page Image status updated successfully.',
        ]);
    }
}
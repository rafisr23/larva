<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $title = 'LARVA | Service';

        return view('admin.service.index', compact('title'));
    }

    public function getServices()
    {
        $services = Service::all();
        return response()->json($services);
    }

    public function create()
    {
        $title = 'LARVA | Create Service';
        return view('admin.service.create', compact('title'));
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'service_name'      => 'required',
            'description'       => 'required',
            'min_price'         => 'required',
            'max_price'         => 'required',
        ]);

        // clear '.' from min_price and max_price
        $request->min_price = str_replace('.', '', $request->min_price);
        $request->max_price = str_replace('.', '', $request->max_price);

        $service = Service::create([
            'service_name'      => $request->service_name,
            'slug'              => SlugService::createSlug(Service::class, 'slug', $request->service_name),
            'tagline'           => $request->tagline,
            'description'       => $request->description,
            'min_price'         => $request->min_price,
            'max_price'         => $request->max_price,
            'notes'             => $request->notes,
            'is_active'         => $request->is_active == 'on' ? '1' : '0',
        ]);

        // store image with loop
        if ($request->hasFile('service_image')) {
            $request->validate([
                'service_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            foreach ($request->file('service_image') as $key => $image) {
                $imageName = $service->slug . '-' . $key . time() . '.' . $image->extension();
                $file_path = $image->storeAs('service', $imageName);
                
                $service->serviceImage()->create([
                    'service_id' => $service->id,
                    'file_name' => $imageName,
                    'file_path' => $file_path,
                ]);
            }
        }

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ]);
    }

    public function destroyImage(Request $request, $imageId) {
        $id = decrypt($imageId);

        $serviceImage = ServiceImage::find($id);
        $serviceImage->delete();

        // delete image from storage
        if (file_exists(public_path('storage/' . $serviceImage->file_path))) {
            unlink(public_path('storage/' . $serviceImage->file_path));
        }

        return response()->json([
            'success' => true,
            'message' => 'Service image deleted successfully.',
        ]);
    }

    public function edit(Service $service)
    {
        $title = 'LARVA | Edit Service';
        return view('admin.service.edit', compact('title', 'service'));
    }

    public function update(Service $service, Request $request) {
        // return $request;

        $request->validate([
            'service_name'      => 'required',
            'description'       => 'required',
            'min_price'         => 'required',
            'max_price'         => 'required',
        ]);

        // clear '.' from min_price and max_price
        $request->min_price = str_replace('.', '', $request->min_price);
        $request->max_price = str_replace('.', '', $request->max_price);

        $service->update([
            'service_name'      => $request->service_name,
            'slug'              => SlugService::createSlug(Service::class, 'slug', $request->service_name),
            'tagline'           => $request->tagline,
            'description'       => $request->description,
            'min_price'         => $request->min_price,
            'max_price'         => $request->max_price,
            'notes'             => $request->notes,
            'is_active'         => $request->is_active == 'on' ? '1' : '0',
        ]);

        if ($request->hasFile('service_image')) {
            $request->validate([
                'service_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            foreach ($request->file('service_image') as $key => $image) {
                $imageName = $service->slug . '-' . $key . time() . '.' . $image->extension();
                $file_path = $image->storeAs('service', $imageName);
                
                $service->serviceImage()->create([
                    'service_id' => $service->id,
                    'file_name' => $imageName,
                    'file_path' => $file_path,
                ]);
            }
        }

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully!');
    }

    public function updateStatus(Service $service, Request $request)
    {
        $service->update([
            'is_active' => $request->status 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service status updated successfully.',
        ]);
    }

    public function updateStatusImage(Request $request)
    {
        $serviceImage = ServiceImage::find(decrypt($request->imageId));

        $serviceImage->update([
            'is_active' => $request->status 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service image status updated successfully!',
        ]);
    }
}
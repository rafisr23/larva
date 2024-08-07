<?php

namespace App\Http\Controllers;

use Image;
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

        if ($request->hasFile('service_icon')) {
            $request->validate([
                'service_icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            $image = $request->file('service_icon');
            $imageName = $service->slug . '-icon' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('service', $imageName);
            
            $service->update([
                'icon' => $file_path,
            ]);

            // crop image
            // $img = Image::make(public_path('storage/' . $file_path));
            // $img->fit(96, 96);
            // $img->save(public_path('storage/' . $file_path));

        }
        
        if ($request->hasFile('service_cover')) {
            $request->validate([
                'service_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            $image = $request->file('service_cover');
            $imageName = $service->slug . '-cover' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('service', $imageName);
            
            $service->update([
                'cover' => $file_path,
            ]);

        }

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully!');
    }

    public function destroy(Service $service)
    {
        // unlink
        foreach ($service->serviceImage as $image) {
            unlink(public_path('storage/' . $image->file_path));
        }

        if (isset($service->icon)) {
            unlink(public_path('storage/' . $service->icon));
        }

        if (isset($service->cover)) {
            unlink(public_path('storage/' . $service->cover));
        }
        
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

        $slug = $service->service_name != $request->service_name ? SlugService::createSlug(Service::class, 'slug', $request->service_name) : $service->slug;

        $service->update([
            'service_name'      => $request->service_name,
            'slug'              => $slug,
            'tagline'           => $request->tagline,
            'description'       => $request->description,
            'min_price'         => $request->min_price,
            'max_price'         => $request->max_price,
            'notes'             => $request->notes,
            'is_active'         => $request->is_active == 'on' ? '1' : '0',
        ]);

        if ($request->hasFile('service_image')) {
            $request->validate([
                'service_image.*' => 'image|mimes:jpeg,png,jpg|max:10240',
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

        if ($request->hasFile('service_icon')) {
            // delete old icon
            if (isset($service->icon)) {
                unlink(public_path('storage/' . $service->icon));
            }

            $request->validate([
                'service_icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            $image = $request->file('service_icon');
            $imageName = $service->slug . '-icon' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('service', $imageName);
            
            $service->update([
                'icon' => $file_path,
            ]);

            // crop image
            // $img = Image::make(public_path('storage/' . $file_path));
            // $img->fit(96, 96);
            // $img->save(public_path('storage/' . $file_path));

        }

        if ($request->hasFile('service_cover')) {
            // delete old cover
            if (isset($service->cover)) {
                unlink(public_path('storage/' . $service->cover));
            }

            $request->validate([
                'service_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            $image = $request->file('service_cover');
            $imageName = $service->slug . '-cover' . time() . '.' . $image->extension();
            $file_path = $image->storeAs('service', $imageName);
            
            $service->update([
                'cover' => $file_path,
            ]);

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

    public function team(Service $service)
    {
        $serviceName = $service->service_name;
        $serviceSlug = $service->slug;
        $title = "LARVA | " . ucwords(strtolower($serviceName)) . " Team";
        return view('admin.service.team', compact('title', 'serviceName', 'serviceSlug'));
    }

    public function getTeams(Service $service)
    {
        $teams = $service->serviceTeam; 

        foreach ($teams as $team) {
            $encId = encrypt($team->id);
            $team->encId = $encId;
        }

        return response()->json($teams);
    }

    public function storeTeam(Service $service, Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
        ]);

        $serviceTeam = $service->serviceTeam()->create([
            'name' => $request->name,
            'position' => $request->position,
            'social_link' => $request->social_link,
        ]);

        if ($request->hasFile('team_image')) {
            $request->validate([
                'team_image' => 'image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $imageName = $service->slug . '-' . $serviceTeam->name . time() . '.' . $request->team_image->extension();
            $file_path = $request->team_image->storeAs('service/team', $imageName);
            
            $serviceTeam->update([
                'image' => $file_path,
            ]);
        }

        return redirect()->route('admin.service.team', $service->slug)->with('success', 'Team Member created successfully!');
    }

    public function getOneTeam(Service $service, $id) {
        $team = $service->serviceTeam()->find(decrypt(request()->id));
        return response()->json($team);
    }

    public function updateTeam(Service $service, Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $serviceTeam = $service->serviceTeam()->find(decrypt($request->id));

        $serviceTeam->update([
            'name' => $request->name,
            'position' => $request->position,
            'social_link' => $request->social_link,
        ]);

        if ($request->hasFile('team_image')) {
            $request->validate([
                'team_image' => 'image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $imageName = $service->slug . '-' . $serviceTeam->name . time() . '.' . $request->team_image->extension();
            $file_path = $request->team_image->storeAs('service/team', $imageName);
            
            $serviceTeam->update([
                'image' => $file_path,
            ]);
        }

        return redirect()->route('admin.service.team', $service->slug)->with('success', 'Team Member updated successfully!');
    }

    public function destroyTeam(Service $service, $id) {
        $serviceTeam = $service->serviceTeam()->find(decrypt($id));

        // unlink image
        if (file_exists(public_path('storage/' . $serviceTeam->image))) {
            unlink(public_path('storage/' . $serviceTeam->image));
        }

        $serviceTeam->delete();

        return response()->json([
            'success' => true,
            'message' => 'Team Member deleted successfully.',
        ]);
    }

}
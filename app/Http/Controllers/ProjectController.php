<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProjectController extends Controller
{
    public function index()
    {
        $title = 'LARVA | Project';
        return view('admin.project.index', compact('title'));
    }

    public function getProjects()
    {
        $projects = Project::with('service')->get();
        return response()->json($projects);
    }

    public function create()
    {
        $title = 'LARVA | Create Project';
        $services = Service::all();
        return view('admin.project.create', compact('title', 'services'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'service_id'        => 'required',
            'project_name'      => 'required',
            'company_name'      => 'required',
            'description'       => 'required',
        ]);

        $decServiceId = decrypt($request->service_id);

        $project = Project::create([
            'service_id'        => $decServiceId,
            'project_name'      => $request->project_name,
            'slug'              => SlugService::createSlug(Project::class, 'slug', $request->project_name),
            'company_name'      => $request->company_name,
            'description'       => $request->description,
            'is_active'         => $request->is_active == 'on' ? '1' : '0',
        ]);

        if ($request->hasFile('project_image')) {
            $request->validate([
                'project_image.*' => 'image|mimes:jpeg,png,jpg|max:10240',
            ]);

            foreach ($request->file('project_image') as $key => $image) {
                $imageName = $project->slug . '-' . $key . time() . '.' . $image->extension();
                $file_path = $image->storeAs('project', $imageName);

                $project->projectImage()->create([
                    'project_id'=> $project->id,
                    'file_name' => $imageName,
                    'file_path' => $file_path,
                ]);
            }
        }

        return redirect()->route('admin.project.index')->with('success', 'Project has been created');
    }

    public function destroy(Project $project)
    {
        // unlink image
        foreach ($project->projectImage as $image) {
            unlink(public_path('storage/' . $image->file_path));
        }
        
        $project->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ]);
    }

    public function edit(Project $project)
    {
        $title = 'LARVA | Edit Project';
        $services = Service::all();

        return view('admin.project.edit', compact('title', 'project', 'services'));
    }

    public function update(Project $project, Request $request)
    {
        // return $request;

        $request->validate([
            'service_id'        => 'required',
            'project_name'      => 'required',
            'company_name'      => 'required',
            'description'       => 'required',
        ]);

        $decServiceId = decrypt($request->service_id);

        $slug = $project->project_name != $request->project_name ? SlugService::createSlug(Project::class, 'slug', $request->project_name) : $project->slug;

        $project->update([
            'service_id'        => $decServiceId,
            'project_name'      => $request->project_name,
            'slug'              => $slug,
            'company_name'      => $request->company_name,
            'description'       => $request->description,
            'is_active'         => $request->is_active == 'on' ? '1' : '0',
        ]);

        if ($request->hasFile('project_image')) {
            $request->validate([
                'project_image.*' => 'image|mimes:jpeg,png,jpg|max:10240',
            ]);

            foreach ($request->file('project_image') as $key => $image) {
                $imageName = $project->slug . '-' . $key . time() . '.' . $image->extension();
                $file_path = $image->storeAs('project', $imageName);

                $project->projectImage()->create([
                    'project_id'=> $project->id,
                    'file_name' => $imageName,
                    'file_path' => $file_path,
                ]);
            }
        }

        return redirect()->route('admin.project.index')->with('success', 'Project updated successfully!');
    }

    public function updateStatus(Project $project, Request $request)
    {
        $project->update([
            'is_active' => $request->status 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Project status updated successfully.',
        ]);
    }

    public function updateStatusImage($imageId, Request $request)
    {
        $decImageId = decrypt($imageId);
        $projectImage = ProjectImage::find($decImageId);
        $projectImage->update([
            'is_active' => $request->status 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Project image status updated successfully.',
        ]);
    }

    public function destroyImage($imageId)
    {
        $decImageId = decrypt($imageId);
        $projectImage = ProjectImage::find($decImageId);
        unlink(public_path('storage/' . $projectImage->file_path));
        $projectImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Project image deleted successfully.',
        ]);
    }
}
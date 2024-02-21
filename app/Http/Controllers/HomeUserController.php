<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function about()
    {
        return view('frontend.home.about');
    }

    public function services(Request $request)
    {
        $type = $request->query('type');

        if (!$type) {
            return view('frontend.home.services');
        } else {
            return view('frontend.home.service-detail', compact('type'));
        
        }

        return view('frontend.home.service-detail');
    }

    public function projects()
    {
        $project = Project::with('service', 'projectImage')->get();
        $service = Service::all();

        // return $project;
        return view('frontend.home.projects', compact('project', 'service'));
    }

    public function projectDetail(Project $project)
    {
        $project = $project->load('service', 'projectImage');

        // return $project;
        return view('frontend.home.projects-detail', compact('project'));
    }

    public function contact()
    {
        return view('frontend.home.contact');
    }
}
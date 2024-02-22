<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\HeaderPageImage;
use App\Models\PageImageCategory;

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
        
        $categoryImage = PageImageCategory::where('category_name', 'project-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();

        // return $headerImage;
        return view('frontend.home.projects', compact('project', 'service', 'headerImage'));
    }

    public function projectDetail(Project $project)
    {
        $project = $project->load('service', 'projectImage');

        $categoryImage = PageImageCategory::where('category_name', 'project-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();
        // return $project;
        return view('frontend.home.projects-detail', compact('project', 'headerImage'));
    }

    public function contact()
    {
        $contact = Contact::first();

        $categoryImage = PageImageCategory::where('category_name', 'contact-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();
        
        return view('frontend.home.contact', compact('contact', 'headerImage'));
    }
}
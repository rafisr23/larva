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
        $contact = Contact::first();
        return view('frontend.home.index', compact('contact'));
    }

    public function about()
    {
        $contact = Contact::first();
        return view('frontend.home.about', compact('contact'));
    }

    public function services(Request $request)
    {
        $contact = Contact::first();
        $type = $request->query('type');

        if (!$type) {
            return view('frontend.home.services', compact('contact'));
        } else {
            return view('frontend.home.service-detail', compact('type', 'contact'));
        
        }

        return view('frontend.home.service-detail', compact('contact'));
    }

    public function projects()
    {
        $contact = Contact::first();
        $project = Project::with('service', 'projectImage')->get();
        $service = Service::all();
        
        $categoryImage = PageImageCategory::where('category_name', 'project-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();

        // return $headerImage;
        return view('frontend.home.projects', compact('project', 'service', 'headerImage', 'contact'));
    }

    public function projectDetail(Project $project)
    {
        $contact = Contact::first();
        $project = $project->load('service', 'projectImage');

        $categoryImage = PageImageCategory::where('category_name', 'project-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();
        // return $project;
        return view('frontend.home.projects-detail', compact('project', 'headerImage', 'contact'));
    }

    public function contact()
    {
        $contact = Contact::first();

        $categoryImage = PageImageCategory::where('category_name', 'contact-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();
        
        return view('frontend.home.contact', compact('contact', 'headerImage', 'contact'));
    }
}
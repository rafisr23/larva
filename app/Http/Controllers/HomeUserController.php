<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Models\HeaderPageImage;
use App\Models\PageImageCategory;
use Ramsey\Uuid\Uuid;

class HomeUserController extends Controller
{
    public function index() 
    {
        $contact = Contact::first();

        $uuid = Uuid::uuid4();

        // return $uuid;

        $categoryImage = PageImageCategory::where('category_name', 'home-middle')->first();
        $middleImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();
        
        if ($middleImage->isEmpty()) {
            $middleImage = null;
        }

        $service = Service::with('serviceImage')->where('is_active', '1')->get();
        $project = Project::with('service', 'projectImage')->orderBy('created_at', 'desc')->get();
        $testimoni = Testimoni::latest()->limit(3)->with('user')->get();
        $partner = Partner::all();
        
        return view('frontend.home.index', compact('contact', 'service', 'middleImage', 'project', 'testimoni', 'partner'));
    }

    public function about()
    {
        $categoryImage = PageImageCategory::where('category_name', 'about-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();

        if ($headerImage->isEmpty()) {
            $headerImage = null;
        }

        $testimoni = Testimoni::latest()->limit(3)->with('user')->get();

        // return $testimoni;
        
        $contact = Contact::first();
        return view('frontend.home.about', compact('contact', 'headerImage', 'testimoni'));
    }

    public function services(Request $request)
    {
        $contact = Contact::first();
        $type = $request->query('type');

        $categoryImage = PageImageCategory::where('category_name', 'service-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();

        if ($headerImage->isEmpty()) {
            $headerImage = null;
        }

        $categoryImage2 = PageImageCategory::where('category_name', 'service-middle')->first();
        $middleImage = HeaderPageImage::where('page_image_category_id', $categoryImage2->id)->get();

        if ($middleImage->isEmpty()) {
            $middleImage = null;
        }

        if (!$type) {
            $service = Service::with('serviceImage')->where('is_active', '1')->get();
            $partner = Partner::all();
            
            return view('frontend.home.services', compact('contact', 'headerImage', 'middleImage', 'service', 'partner'));
        } else {
            $service = Service::where('slug', $type)->with('serviceImage')->first();
            return view('frontend.home.service-detail', compact('type', 'contact', 'service', 'headerImage'));
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

        if ($headerImage->isEmpty()) {
            $headerImage = null;
        }

        // return $headerImage;
        return view('frontend.home.projects', compact('project', 'service', 'headerImage', 'contact'));
    }

    public function projectDetail(Project $project)
    {
        $contact = Contact::first();
        $project = $project->load('service', 'projectImage');

        $categoryImage = PageImageCategory::where('category_name', 'project-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();

        if ($headerImage->isEmpty()) {
            $headerImage = null;
        }

        // return $project;
        return view('frontend.home.projects-detail', compact('project', 'headerImage', 'contact'));
    }

    public function contact()
    {
        $contact = Contact::first();

        $categoryImage = PageImageCategory::where('category_name', 'contact-header')->first();
        $headerImage = HeaderPageImage::where('page_image_category_id', $categoryImage->id)->get();

        if ($headerImage->isEmpty()) {
            $headerImage = null;
        }
        
        return view('frontend.home.contact', compact('contact', 'headerImage', 'contact'));
    }
}
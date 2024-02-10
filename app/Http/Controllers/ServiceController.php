<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $title = 'LARVA | Service';
        $services = Service::all();

        if ($request->ajax()) {
            return response()->json($services);
        }

        return view('admin.service.index', compact('title'));
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

        $service = Service::create([
            'service_name'      => $request->service_name,
            'slug'              => SlugService::createSlug(Service::class, 'slug', $request->service_name),
            'description'       => $request->description,
            'min_price'         => $request->min_price,
            'max_price'         => $request->max_price,
            'notes'             => $request->notes,
        ]);

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully.');
    }
}
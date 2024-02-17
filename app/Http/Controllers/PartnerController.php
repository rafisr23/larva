<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PartnerController extends Controller
{
    public function index() 
    {
        $title = 'Larva | Partner';

        return view('admin.partner.index', compact('title'));
    }

    public function getPartners() 
    {
        $partners = Partner::all();

        return response()->json($partners);
    }

    public function create() 
    {
        $title = 'Larva | Create Partner';

        return view('admin.partner.create', compact('title'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'company_name'  => 'required',
            'description'   => 'required',
            'partner_logo'  => 'required',
        ]);
        
        $partner = Partner::create([
            'company_name' => $request->company_name,
            'slug'         => SlugService::createSlug(Partner::class, 'slug', $request->company_name),
            'description'  => $request->description,
            'is_active'    => $request->is_active == 'on' ? '1' : '0',
        ]);

        if ($request->hasFile('partner_logo')) {
            $request->validate([
                'partner_logo' => 'image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $imageName = $partner->slug . '-' . time() . '.' . $request->partner_logo->extension();
            $file_path = $request->partner_logo->storeAs('partner', $imageName);

            $partner->update([
                'icon' => $file_path,
            ]);
        }

        return redirect()->route('admin.partner.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner) 
    {
        $title = 'Larva | Edit Partner';

        return view('admin.partner.edit', compact('title', 'partner'));
    }

    public function update(Request $request, Partner $partner) 
    {
        $request->validate([
            'company_name'  => 'required',
            'description'   => 'required',
        ]);

        $slug = $partner->company_name != $request->company_name ? SlugService::createSlug(Partner::class, 'slug', $request->company_name) : $partner->slug;

        $partner->update([
            'company_name' => $request->company_name,
            'slug'         => $slug,
            'description'  => $request->description,
            'is_active'    => $request->is_active == 'on' ? '1' : '0',
        ]);

        if ($request->hasFile('partner_logo')) {
            if ($partner->icon) {
                unlink( public_path('storage/' .$partner->icon));
            }
            
            $request->validate([
                'partner_logo' => 'image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $imageName = $partner->slug . '-' . time() . '.' . $request->partner_logo->extension();
            $file_path = $request->partner_logo->storeAs('partner', $imageName);

            $partner->update([
                'icon' => $file_path,
            ]);
        }

        return redirect()->route('admin.partner.index')->with('success', 'Partner updated successfully.');
    }

    public function updateStatus(Request $request, Partner $partner) 
    {
        $partner->update([
            'is_active' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Project status updated successfully.',
        ]);
    }

    public function destroy(Partner $partner) 
    {
        // unlink icon
        if ($partner->icon) {
            unlink(public_path('storage/' .$partner->icon));
        }
        
        $partner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ]);
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();

        if ($request->ajax()) {
            return response()->json($services);
        }

        return view('admin.service.index');
    }
}
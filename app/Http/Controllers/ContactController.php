<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() 
    {
        $title = 'Larva | Contact';
        $contact = Contact::all()->first();

        return view('admin.contact.index', compact('title', 'contact'));
    }

    public function store(Request $request) 
    {
        // return $request->all();
        $decContactId = $request->contact_id ? decrypt($request->contact_id) : '';

        // updateOrCreate
        $contact = Contact::updateOrCreate(
            ['id' => $decContactId],
            [
                'address'       => $request->address,
                'city'          => $request->city,
                'country'       => $request->country,
                'postal_code'   => $request->postal_code,
                'telephone'     => $request->telephone,
                'phone'         => $request->phone,
                'email'         => $request->email,
            ]
        );

        return redirect()->route('admin.contact.index')->with('success', 'Contact has been updated');
    }
}
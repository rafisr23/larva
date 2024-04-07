<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

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
                'instagram'     => $request->instagram,
                'youtube'       => $request->youtube,
            ]
        );

        return redirect()->route('admin.contact.index')->with('success', 'Contact has been updated');
    }

    // send email with smtp and use Email class laravel
    public function sendEmail(Request $request) 
    {
        $contact = Contact::first();
        $body = [
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'subject'   => $request->subject,
            'message'   => $request->message,
        ];

        Mail::to($contact->email)->send(new ContactEmail($body));

        return redirect()->route('user-contact')->with('success', 'Thanks for contacting us. We will contact you ASAP!');
    }
}
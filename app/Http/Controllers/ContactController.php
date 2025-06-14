<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderByDesc('created_at')->get();

        return view('contacts.index')->with([
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validated);

        if(!$contact) {
            return back()->with([
                'error' => 'Failed to contacts.'
            ]);
        }

        // return redirect()->route('client.contacts')
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show')->with([
            'contact' => $contact
        ]);
    }

    public function showing()
    {

        return view('contacts.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $status = $contact->delete();

        if(!$status) {
            return back()->with([
                'error' => 'Failed to delete contacts.'
            ]);
        }

        return redirect()->route('contacts.index')->with([
            'success' => 'Contact Successfully deleted.' 
        ]);
    }
}

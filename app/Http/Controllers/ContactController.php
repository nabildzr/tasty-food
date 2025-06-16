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
        if (! user_can('contact_access')) {
            return redirect()->route('dashboard');
        }

        $contacts = Contact::orderByDesc('created_at')->get();

        return view('admin.contacts.index')->with([
            'contacts' => $contacts,
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
        if (! user_can('contact_access')) {
            return redirect()->route('dashboard');
        }

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validated);

        if (! $contact) {
            return back()->with([
                'error' => 'Failed to contacts.',
            ]);
        }

        // return redirect()->route('client.contacts')
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        if (! user_can('contact_access')) {
            return redirect()->route('dashboard');
        }

        $result = Contact::findOrFail($id);

        return view('admin.contacts.show')->with([
            'result' => $result,
        ]);
    }

    public function showing()
    {

        return view('admin.contacts.show');
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
        if (! user_can('contact_access')) {
            return redirect()->route('dashboard');
        }

        $contact = Contact::findOrFail($id);

        $status = $contact->delete();

        if (! $status) {
            return back()->with([
                'error' => 'Failed to delete contacts.',
            ]);
        }

        return redirect()->route('contacts.index')->with([
            'success' => 'Contact Successfully deleted.',
        ]);
    }
}

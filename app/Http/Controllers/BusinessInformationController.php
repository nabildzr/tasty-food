<?php

namespace App\Http\Controllers;

use App\Models\BusinessInformation;
use Illuminate\Http\Request;

class BusinessInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! user_can('business_information_access')) {
            return redirect()->route('dashboard');
        }

        $businessInformation = BusinessInformation::first();

        return view('admin.business-information.form')->with([
            'businessInformation' => $businessInformation,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request)
    {
        if (! user_can('business_information_access')) {
            return redirect()->route('dashboard');
        }

        $businessInformation = BusinessInformation::first();

        $validated = $request->validate([
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $businessInformation->update($validated);

        if (! $businessInformation) {
            return back()->with([
                'error' => 'Failed to update business information.',
            ]);
        }

        return redirect()->route('business-information.index')->with([
            'success' => 'Business information updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

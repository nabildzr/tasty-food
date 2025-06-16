<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class ClientAboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $top = AboutUs::where('position', 'top')->first();
        $middle = AboutUs::where('position', 'middle')->first();
        $bottom = AboutUs::where('position', 'bottom')->first();

        return view('client.about.index')->with([
            'top' => $top,
            'middle' => $middle,
            'bottom' => $bottom,
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

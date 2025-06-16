<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\SliderGallery;
use Illuminate\Http\Request;

class ClientGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliderGalleries = SliderGallery::orderByDesc('created_at')->get();
        $galleries = Gallery::orderByDesc('created_at')->get();

        return view('client.galleries.index')->with([
            'sliderGalleries' => $sliderGalleries,
            'galleries' => $galleries
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

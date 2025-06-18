<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderByDesc('created_at')->take(6)->get();
        $news = News::orderByDesc('created_at')->skip(1)->take(4)->get();
        $newlyNews = News::orderByDesc('created_at')->first();

        return view('client.home.index')->with([
            'galleries' => $galleries,
            'news' => $news,
            'newlyNews' => $newlyNews,
        ]);
    }

    /**
     * Show the form for creating a new resourche.
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

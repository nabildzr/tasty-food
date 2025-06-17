<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ClientNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderByDesc('created_at')->skip(1)->take(9999)->get();
        // $news = News::orderByDesc('created_at')->get();
        $newlyNews = News::orderByDesc('created_at')->first();

        return view('client.news.index')->with([
            'news' => $news,
            'newlyNews' => $newlyNews,
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
    public function show(string $slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('client.news.show')->with([
            'news' => $news,
        ]);
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

<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! user_can('news_access')) {
            return redirect()->route('dashboard');
        }

        $news = News::orderByDesc('created_at')->get();

        return view('admin.news.index')->with([
            'news' => $news,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function myNews()
    {
        if (! user_can('news_access')) {
            return redirect()->route('dashboard');
        }

        // $user = Auth::user()->id;
        $user = User::find(1);

        $news = News::where('created_by', $user->id)->orderByDesc('created_at')->get();

        return view('admin.news.my-index')->with([
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! user_can('news_access')) {
            return redirect()->route('dashboard');
        }

        return view('admin.news.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! user_can('news_access')) {
            return redirect()->route('dashboard');
        }

        $validated = $request->validate([
            'banner' => 'file|mimes:png,jpg,jpeg|max:10000',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($request->file('banner')) {
            $validated['banner'] = $request->file('banner')->store('news_banner', 'public');
        }

        // Generate unique slug, avoid same slug
        $baseSlug = str_replace(' ', '-', strtolower($request->input('title')));
        $slug = $baseSlug;
        $counter = 2;
        while (News::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
            // ex: wadaw-berita-coi is exist then will be wadaw-berita-coi-2
        }

        $validated['slug'] = $slug;

        $validated['created_by'] = User::find(1)->id;

        $news = News::create($validated);

        if (! $news) {
            return back()->with([
                'error' => 'Failed to create News',
            ]);
        }

        return redirect()->route('news.index')->with([
            'success' => 'News successfully created.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! user_can('news_access')) {
            return redirect()->route('dashboard');
        }

        $result = News::findOrFail($id);

        return view('admin.news.form')->with([
            'result' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! user_can('news_access')) {
            return redirect()->route('dashboard');
        }

        $news = News::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'file|mimes:png,jpg,jpeg|max:10000',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        // $validated['slug'] = str_replace(' ', '-', strtolower($validated['slug']));
        $validated['slug'] = str_replace(' ', '-', strtolower($validated['title']));

        if ($request->file('banner')) {

            if ($news->banner) {
                Storage::disk('public')->delete($news->banner);
            }

            $validated['banner'] = $request->file('banner')->store('news_banner', 'public');
        }

        $status = $news->update($validated);

        if (! $status) {
            return back()->with([
                'error' => 'Failed to create News',
            ]);
        }

        return redirect()->route('news.index')->with([
            'success' => 'News successfully created.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! user_can('news_access')) {
            return redirect()->route('dashboard');
        }

        $news = News::findOrFail($id);

        $status = $news->delete();

        if (! $status) {
            return back()->with([
                'error' => 'Failed to delete News',
            ]);
        }

        return redirect()->route('news.index')->with([
            'success' => 'News successfully deleted.',
        ]);
    }
}

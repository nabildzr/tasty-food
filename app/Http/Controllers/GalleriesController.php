<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\SliderGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderByDesc('created_at')->get();

        return view('galleries.index')->with([
            'galleries' => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:2048'
        ]);


        if ($request->file('photo')) {
            $validated['photo'] = $request->file('photo')->store('galleries', 'public');
        }

        $validated['created_by'] = User::find(1)->id;
        // $validated['created_by'] = Auth::user()->id;

        $gallery = Gallery::create($validated);


        if (!$gallery) {
            return back()->with([
                'error' => 'Failed to create gallery.'
            ]);
        }

        return redirect()->route('galleries.index')->with([
            'success' => 'Gallery Successfully created.'
        ]);
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
        $result = Gallery::findOrFail($id);

        return view('galleries.form')->with([
            'result' => $result
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->file('photo')) {

            if ($gallery->photo) {
                Storage::disk('public')->delete($gallery->photo);
            }

            $validated['photo'] = $request->file('photo')->store('galleries', 'public');
        }


        $status = $gallery->update($validated);

        if (!$status) {
            return back()->with([
                'error' => 'Failed to update gallery.'
            ]);
        }

        return redirect()->route('galleries.index')->with([
            'success' => 'Gallery successfully updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $status = $gallery->delete();

        if (!$status) {
            return back()->with([
                'error' => 'Failed to delete gallery.'
            ]);
        }

        return redirect()->route('galleries.index')->with([
            'success' => 'Gallery successfully deleted'
        ]);
    }


    // // // //
    // SLIDER 
    // // // //

    /**
     * Display a listing of the resource.
     */
    public function sliderIndex()
    {
        $galleries = SliderGallery::orderByDesc('created_at')->get();

        return view('galleries.slider-index')->with([
            'galleries' => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sliderCreate()
    {
        return view('galleries.slider-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sliderStore(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:2048'
        ]);


        if ($request->file('photo')) {
            $validated['photo'] = $request->file('photo')->store('galleries', 'public');
        }

        $validated['created_by'] = User::find(1)->id;
        // $validated['created_by'] = Auth::user()->id;

        $gallery = SliderGallery::create($validated);


        if (!$gallery) {
            return back()->with([
                'error' => 'Failed to create gallery.'
            ]);
        }

        return redirect()->route('galleries.index')->with([
            'success' => 'Gallery Successfully created.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function sliderShow(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function sliderEdit(string $id)
    {
        $result = SliderGallery::findOrFail($id);

        return view('galleries.form')->with([
            'result' => $result
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function sliderUpdate(Request $request, string $id)
    {
        $gallery = SliderGallery::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->file('photo')) {

            if ($gallery->photo) {
                Storage::disk('public')->delete($gallery->photo);
            }

            $validated['photo'] = $request->file('photo')->store('galleries', 'public');
        }


        $status = $gallery->update($validated);

        if (!$status) {
            return back()->with([
                'error' => 'Failed to update gallery.'
            ]);
        }

        return redirect()->route('galleries.index')->with([
            'success' => 'Gallery successfully updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function sliderDestroy(string $id)
    {
        $gallery = SliderGallery::findOrFail($id);

        $status = $gallery->delete();

        if (!$status) {
            return back()->with([
                'error' => 'Failed to delete gallery.'
            ]);
        }

        return redirect()->route('galleries.index')->with([
            'success' => 'Gallery successfully deleted'
        ]);
    }
}

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
        if (!user_can('gallery_access')) {
            return redirect()->route('dashboard');
        }

        $galleries = Gallery::orderByDesc('created_at')->get();

        return view('admin.galleries.index')->with([
            'galleries' => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!user_can('gallery_access')) {
            return redirect()->route('dashboard');
        }

        return view('admin.galleries.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!user_can('gallery_access')) {
            return redirect()->route('dashboard');
        }

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
        if (!user_can('gallery_access')) {
            return redirect()->route('dashboard');
        }


        $result = Gallery::findOrFail($id);

        return view('admin.galleries.form')->with([
            'result' => $result
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!user_can('gallery_access')) {
            return redirect()->route('dashboard');
        }

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
        if (!user_can('gallery_access')) {
            return redirect()->route('dashboard');
        }

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
        if (!user_can('slider_gallery_access')) {
            return redirect()->route('dashboard');
        }

        $galleries = SliderGallery::orderByDesc('created_at')->get();

        return view('admin.galleries.slider-index')->with([
            'galleries' => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sliderCreate()
    {
        if (!user_can('slider_gallery_access')) {
            return redirect()->route('dashboard');
        }

        return view('admin.galleries.slider-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sliderStore(Request $request)
    {
        if (!user_can('slider_gallery_access')) {
            return redirect()->route('dashboard');
        }

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

        return redirect()->route('galleries.slider.index')->with([
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
        if (!user_can('slider_gallery_access')) {
            return redirect()->route('dashboard');
        }

        $result = SliderGallery::findOrFail($id);

        return view('admin.galleries.slider-form')->with([
            'result' => $result
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function sliderUpdate(Request $request, string $id)
    {
        if (!user_can('slider_gallery_access')) {
            return redirect()->route('dashboard');
        }

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

        if (!user_can('slider_gallery_access')) {
            return redirect()->route('dashboard');
        }

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

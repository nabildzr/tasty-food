<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (! user_can('about_us_access')) {
            return redirect()->route('dashboard');
        }

        $aboutUs = AboutUs::all();

        return view('admin.about-us.index')->with([
            'aboutUs' => $aboutUs,
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

        if (! user_can('about_us_access')) {
            return redirect()->route('dashboard');
        }

        $result = AboutUs::findOrFail($id);

        return view('admin.about-us.form')->with([
            'result' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! user_can('about_us_access')) {
            return redirect()->route('dashboard');
        }

        $aboutUs = AboutUs::findOrFail($id);

        $validated = $request->validate([
            'position' => 'required|in:top,middle,bottom',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'photo_left' => 'nullable|file|mimes:jpg,png,jpeg',
            'photo_right' => 'nullable|file|mimes:jpg,png,jpeg',
        ]);

        if ($request->has('delete_photo_left') && $aboutUs->photo_left) {
            Storage::disk('public')->delete($aboutUs->photo_left);
            $aboutUs->photo_left = null;
        }

        if ($request->has('delete_photo_right') && $aboutUs->photo_right) {
            Storage::disk('public')->delete($aboutUs->photo_right);
            $aboutUs->photo_right = null;
        }

        // Jika posisi diubah, tukar posisi dengan entri lain yang memiliki posisi target
        if ($aboutUs->position !== $validated['position']) {
            $other = AboutUs::where('position', $validated['position'])->first();
            if ($other) {
                $other->position = $aboutUs->position;
                $other->save();
            }
        }

        if ($request->hasFile('photo_left')) {
            if ($aboutUs->photo_left) {
                Storage::disk('public')->delete($aboutUs->photo_left);
            }
            $validated['photo_left'] = $request->file('photo_left')->store('about-us', 'public');
        }

        if ($request->hasFile('photo_right')) {
            if ($aboutUs->photo_right) {
                Storage::disk('public')->delete($aboutUs->photo_right);
            }
            $validated['photo_right'] = $request->file('photo_right')->store('about-us', 'public');
        }

        $status = $aboutUs->update($validated);

        if (! $status) {
            return back()->with([
                'error' => "Failed to update  About Us ID $aboutUs->id",
            ]);
        }

        return redirect()->route('about-us.index')->with([
            'success' => "About Us ID $aboutUs->id Successfully updated.",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}

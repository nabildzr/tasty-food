<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderByDesc('created_at')->get();

        return view('admin.menus.index')->with([
            'menus' => $menus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menus.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:10000',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('menus', 'public');
        }

        $user = User::find(1);
        $validated['created_by'] = $user ? $user->id : null;

        $menu = Menu::create($validated);

        if (! $menu) {
            return back()->with([
                'error' => 'Failed to create Menu',
            ]);
        }

        return redirect()->route('menus.index')->with([
            'success' => 'Menu Successfully created.',
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
        $result = Menu::findOrFail($id);

        return view('admin.menus.form')->with([
            'result' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|file|mimes:png,jpg,jpeg|max:10000',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('menus', 'public');
        }

        $menu->update($validated);

        if (! $menu) {
            return back()->with([
                'error' => 'Failed to update Menu',
            ]);
        }

        return redirect()->route('menus.index')->with([
            'success' => 'Menu Successfully updated.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        $status = $menu->delete();

        if (! $status) {
            return back()->with([
                'error' => 'Failed to delete Menu',
            ]);
        }

        return redirect()->route('menus.index')->with([
            'success' => 'Menu Successfully deleted.',
        ]);
    }
}

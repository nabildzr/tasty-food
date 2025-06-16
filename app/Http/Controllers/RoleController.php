<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role->name !== 'Super Admin') {
            return redirect()->route('dashboard');
        }

        $roles = Role::orderByDesc('created_at')->get();

        return view('admin.roles.index')->with([
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role->name !== 'Super Admin') {
            return redirect()->route('dashboard');
        }

        return view('admin.roles.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role->name !== 'Super Admin') {
            return redirect()->route('dashboard');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'news_access' => 'boolean',
            'menu_access' => 'boolean',
            'about_us_access' => 'boolean',
            'users_access' => 'boolean',
            'slider_gallery_access' => 'boolean',
            'gallery_access' => 'boolean',
            'contact_access' => 'boolean',
            'business_information_access' => 'boolean',
        ], [
            'name.required' => 'Name is required.',
        ]);

        if ($validated['name'] === 'Super Admin') {
            return back()->with([
                'error' => 'Cannot create Role with name Super Admin',
            ]);
        }

        $role = Role::create($validated);

        if (! $role) {
            return back()->with([
                'error' => 'Failed to create Role.',
            ]);
        }

        return redirect()->route('roles.index')->with([
            'success' => 'Role Successfully Created.',
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

        if (Auth::user()->role->name !== 'Super Admin') {
            return redirect()->route('dashboard');
        }

        $result = Role::findOrFail($id);

        if ($result->name === 'Super Admin') {
            return redirect()->route('roles.index');
        }

        return view('admin.roles.form')->with([
            'result' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->role->name !== 'Super Admin') {
            return redirect()->route('dashboard');
        }

        $role = Role::findOrFail($id);

        if ($role->name === 'Super Admin') {
            return redirect()->route('roles.index');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$role->id,
            'news_access' => 'boolean',
            'menu_access' => 'boolean',
            'about_us_access' => 'boolean',
            'users_access' => 'boolean',
            'slider_gallery_access' => 'boolean',
            'gallery_access' => 'boolean',
            'contact_access' => 'boolean',
            'business_information_access' => 'boolean',
        ]);

        $role = $role->update($validated);

        if (! $role) {
            return back()->with([
                'error' => 'Failed to update Role.',
            ]);
        }

        return redirect()->route('roles.index')->with([
            'success' => 'Role Successfully Updated.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->role->name !== 'Super Admin') {
            return redirect()->route('dashboard');
        }

        $role = Role::findOrFail($id);

        if ($role->name === 'Super Admin') {
            return back()->with([
                'error' => 'Super Admin cannot be deleted',
            ]);
        }

        $role->delete();

        if (! $role) {
            return back()->with([
                'error' => 'Failed to delete Role.',
            ]);
        }

        return redirect()->route('roles.index')->with([
            'success' => 'Role Successfully Deleted.',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::OrderByDesc('created_at')->first();
        $users = User::OrderByDesc('created_at')->get();

        return view('users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderByDesc('created_at')->get();

        return view('users.form')->with([
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|string',
            'role_id' => 'required|exists:roles,id'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        if (!$user) {
            return back()->with([
                'error' => 'Failed to create User'
            ]);
        }

        return redirect()->route('users.index')->with([
            'success' => 'User Successfully Created.'
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
        $result = User::findOrFail($id);
        $roles = Role::orderByDesc('created_at')->get();

        return view('users.form')->with([
            'result' => $result,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email,'.$user->id,
            'role_id' => 'required|exists:roles,id'
        ]);

        if ($validated['role_id'] !== $user->role->id) {
            $validated['role_id'] = $validated['role_id'];
        }

        $status = $user->update($validated);


        if (!$status) {
            return back()->with([
                'error' => 'Failed to update User'
            ]);
        }

        return redirect()->route('users.index')->with([
            'success' => 'User Successfully Updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete($id);

        if (!$user) {
            return redirect()->route('users.index')->with([
                'success' => 'User Successfully Deleted.'
            ]);
        }
    }
}

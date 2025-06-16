<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!user_can('users_access')) {
            return redirect()->route('dashboard');
        }

        // $users = User::OrderByDesc('created_at')->first();
        $users = User::OrderByDesc('created_at')->get();

        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!user_can('users_access')) {
            return redirect()->route('dashboard');
        }

        $roles = Role::where('id', '!=', 1)->orderByDesc('created_at')->get();

        return view('admin.users.form')->with([
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!user_can('users_access')) {
            return redirect()->route('dashboard');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|string',
            'role_id' => 'required|exists:roles,id'
        ]);

        if ($validated['role_id'] == 1) {
            return back()->with([
                'error' => 'Failed to create user. Cannot add Super Admin Roles.'
            ]);
        }

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
    public function show()
    {
      
        $user = Auth::user();

        return view('admin.users.show')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!user_can('users_access')) {
            return redirect()->route('dashboard');
        }



        $result = User::findOrFail($id);


        if ($result->role->id == 1) {
            return redirect()->route('users.index');
        }

        $roles = Role::orderByDesc('created_at')->get();

        return view('admin.users.form')->with([
            'result' => $result,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!user_can('users_access')) {
            return redirect()->route('dashboard');
        }

        $user = User::findOrFail($id);

        if ($user->role->id == 1) {
            return back()->with([
                'error' => 'Failed to update user. Cannot update Super Admin.'
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email,' . $user->id,
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
        if (!user_can('users_access')) {
            return redirect()->route('dashboard');
        }

        $user = User::findOrFail($id);

        if ($user->role->id == 1) {
            return back()->with([
                'error' => 'Failed to deleting user. Cannot delete Super Admin.'
            ]);
        }

        $user->delete($id);

        if (!$user) {
            return redirect()->route('users.index')->with([
                'success' => 'User Successfully Deleted.'
            ]);
        }
    }



    // profile

    public function editProfile()
    {
       

        $user = Auth::user();
        $roles = Role::orderByDesc('created_at')->get();


        return view('admin.users.show-form')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function updateProfile(Request $request)
    {
       

        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|unique:users,email,' . Auth::id(),
            'new_password' => 'nullable|string|min:6',
            'role_id' => 'sometimes|exists:roles,id',
        ]);

        $status = $user->update($validated);

        if (!$status) {
            return back()->with([
                'error' => "Failed to updating Profile."
            ]);
        }

        return redirect()->route('user.show')->with([
            'success' => 'Profile Successfully updated.'
        ]);
    }
}

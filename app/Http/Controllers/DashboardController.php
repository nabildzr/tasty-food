<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (user_can('contact_access')) {
            $contactMails = Contact::orderByDesc('created_at')->get();
        } else {
            $contactMails = collect();
        }

        if (Auth::user()->role->name == 'Super Admin') {
            $roles = Role::all()->count();
        } else {
            $roles = collect();
        }

        if (user_can('news_access')) {
            $news = News::all()->count();
        } else {
            $news = collect();
        }

        if (user_can('users_access')) {
            $users = User::all()->count();
        } else {
            $users = collect();
        }

        if (user_can('gallery_access')) {
            $galleries = Gallery::all()->count();
        } else {
            $galleries = collect();
        }

        return view('admin.dashboard.index')->with([
            'contactMails' => $contactMails,
            'roles' => $roles,
            'news' => $news,
            'galleries' => $galleries,
            'users' => $users,
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

<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});




Route::prefix('roles')->middleware(['guest'])->controller(RoleController::class)->group(function () {
    Route::get('/', 'index')->name('roles.index');

    Route::get('/create', 'create')->name('roles.create');
    Route::post('/create', 'store')->name('roles.store');

    Route::get('/edit/{id}', 'edit')->name('roles.edit');
    Route::put('/edit/{id}', 'update')->name('roles.update');

    Route::delete('/delete/{id}', 'destroy')->name('roles.delete');
});

Route::prefix('users')->middleware(['guest'])->controller(UsersController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');

    Route::get('/create', 'create')->name('users.create');
    Route::post('/create', 'store')->name('users.store');

    Route::get('/edit/{id}', 'edit')->name('users.edit');
    Route::put('/edit/{id}', 'update')->name('users.update');

    Route::delete('/delete/{id}', 'destroy')->name('users.delete');
});


Route::prefix('menus')->middleware(['guest'])->controller(MenuController::class)->group(function () {
    Route::get('/', 'index')->name('menus.index');

    Route::get('/create', 'create')->name('menus.create');
    Route::post('/create', 'store')->name('menus.store');

    Route::get('/edit/{id}', 'edit')->name('menus.edit');
    Route::put('/edit/{id}', 'update')->name('menus.update');

    Route::delete('/delete/{id}', 'destroy')->name('menus.delete');
});


Route::prefix('news')->middleware(['guest'])->controller(NewsController::class)->group(function () {
    Route::get('/', 'index')->name('news.index');
    Route::get('/me', 'myNews')->name('news.myNews');

    Route::get('/create', 'create')->name('news.create');
    Route::post('/create', 'store')->name('news.store');

    Route::get('/edit/{id}', 'edit')->name('news.edit');
    Route::put('/edit/{id}', 'update')->name('news.update');

    Route::delete('/delete/{id}', 'destroy')->name('news.delete');
});


Route::prefix('contacts')->middleware(['guest'])->controller(ContactController::class)->group(function () {
    Route::get('/', 'index')->name('contacts.index');
    Route::get('/{id}', 'show')->name('contacts.show');
    Route::get('/show', 'showing')->name('contacts.showing');

    Route::get('/create', 'create')->name('contacts.create');
    Route::post('/create', 'store')->name('contacts.store');

    Route::get('/edit/{id}', 'edit')->name('contacts.edit');
    Route::put('/edit/{id}', 'update')->name('contacts.update');

    Route::delete('/delete/{id}', 'destroy')->name('contacts.delete');
});


Route::prefix('galleries')->middleware(['guest'])->controller(GalleriesController::class)->group(function () {
    Route::get('/', 'index')->name('galleries.index');

    Route::get('/create', 'create')->name('galleries.create');
    Route::post('/create', 'store')->name('galleries.store');

    Route::get('/edit/{id}', 'edit')->name('galleries.edit');
    Route::put('/edit/{id}', 'update')->name('galleries.update');

    Route::delete('/delete/{id}', 'destroy')->name('galleries.delete');
    
    // slider
    Route::get('/slider', 'sliderIndex')->name('galleries.slider.index');

    Route::get('/slider/create', 'sliderCreate')->name('galleries.slider.create');
    Route::post('/slider/create', 'sliderStore')->name('galleries.slider.store');

    Route::get('/slider/edit/{id}', 'sliderEdit')->name('galleries.slider.edit');
    Route::put('/slider/edit/{id}', 'sliderUpdate')->name('galleries.slider.update');

    Route::delete('/slider/delete/{id}', 'sliderDestroy')->name('galleries.slider.delete');
});

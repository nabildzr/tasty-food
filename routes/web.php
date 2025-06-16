<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessInformationController;
use App\Http\Controllers\ClientAboutUsController;
use App\Http\Controllers\ClientContactController;
use App\Http\Controllers\ClientGalleriesController;
use App\Http\Controllers\ClientNewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/galleries', [ClientGalleriesController::class, 'index'])->name('client.galleries');
    Route::get('/contact', [ClientContactController::class, 'index'])->name('client.contact');
    Route::post('/contact', [ClientContactController::class, 'store'])->name('client.contact.store');
    Route::get('/news', [ClientNewsController::class, 'index'])->name('client.news');
    Route::get('/news/{id}', [ClientNewsController::class, 'show'])->name('client.news.show');
    Route::get('/about-us', [ClientAboutUsController::class, 'index'])->name('client.about-us');
    
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'actionLogin'])->name('user.login');
        Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('user.forgot-password');
        Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail'])->name('user.forgot-password.send');

        Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
    });

}); 


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'actionLogout'])->name('user.logout');



    Route::prefix('business-information')->middleware(['auth'])->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('business-information.index');

        Route::get('/create', 'create')->name('business-information.create');
        Route::post('/create', 'store')->name('business-information.store');

        Route::get('/edit/{id}', 'edit')->name('business-information.edit');
        Route::put('/edit/{id}', 'update')->name('business-information.update');

        Route::delete('/delete/{id}', 'destroy')->name('business-information.delete');
    });


    Route::prefix('about-us')->middleware(['auth'])->controller(AboutUsController::class)->group(function () {
        Route::get('/', 'index')->name('about-us.index');

        Route::get('/edit/{id}', 'edit')->name('about-us.edit');
        Route::put('/edit/{id}', 'update')->name('about-us.update');

        Route::delete('/delete/{id}', 'destroy')->name('about-us.delete');
    });


    Route::prefix('roles')->middleware(['auth'])->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('roles.index');

        Route::get('/create', 'create')->name('roles.create');
        Route::post('/create', 'store')->name('roles.store');

        Route::get('/edit/{id}', 'edit')->name('roles.edit');
        Route::put('/edit/{id}', 'update')->name('roles.update');

        Route::delete('/delete/{id}', 'destroy')->name('roles.delete');
    });


    Route::prefix('user')->middleware(['auth'])->controller(UsersController::class)->group(function () {
        Route::get('/profile', 'show')->name('user.show');

        Route::get('/profile/edit', 'editProfile')->name('user.edit.profile');
        Route::put('/profile/edit', 'updateProfile')->name('user.update.profile');
    });

    Route::prefix('users')->middleware(['auth'])->controller(UsersController::class)->group(function () {
        Route::get('/', 'index')->name('users.index');




        Route::get('/create', 'create')->name('users.create');
        Route::post('/create', 'store')->name('users.store');

        Route::get('/edit/{id}', 'edit')->name('users.edit');
        Route::put('/edit/{id}', 'update')->name('users.update');

        Route::delete('/delete/{id}', 'destroy')->name('users.delete');
    });


    Route::prefix('menus')->middleware(['auth'])->controller(MenuController::class)->group(function () {
        Route::get('/', 'index')->name('menus.index');

        Route::get('/create', 'create')->name('menus.create');
        Route::post('/create', 'store')->name('menus.store');

        Route::get('/edit/{id}', 'edit')->name('menus.edit');
        Route::put('/edit/{id}', 'update')->name('menus.update');

        Route::delete('/delete/{id}', 'destroy')->name('menus.delete');
    });


    Route::prefix('news')->middleware(['auth'])->controller(NewsController::class)->group(function () {
        Route::get('/', 'index')->name('news.index');
        Route::get('/me', 'myNews')->name('news.myNews');

        Route::get('/create', 'create')->name('news.create');
        Route::post('/create', 'store')->name('news.store');

        Route::get('/edit/{id}', 'edit')->name('news.edit');
        Route::put('/edit/{id}', 'update')->name('news.update');

        Route::delete('/delete/{id}', 'destroy')->name('news.delete');
    });


    Route::prefix('business-information')->middleware(['auth'])->controller(BusinessInformationController::class)->group(function () {
        Route::get('/', 'index')->name('business-information.index');
        Route::put('/', 'update')->name('business-information.update');
    });



    Route::prefix('contacts')->middleware(['auth'])->controller(ContactController::class)->group(function () {
        Route::get('/', 'index')->name('contacts.index');


        Route::get('/one', 'showing')->name('contacts.showing');
        Route::get('/{id}', 'show')->name('contacts.show');

        Route::delete('/delete/{id}', 'destroy')->name('contacts.delete');
    });


    Route::prefix('galleries')->middleware(['auth'])->controller(GalleriesController::class)->group(function () {
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
});

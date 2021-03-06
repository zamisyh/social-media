<?php

use App\Http\Livewire\Auth\Signin;
use App\Http\Livewire\Auth\Signup;
use App\Http\Livewire\Components\Profile\Settings;
use App\Http\Livewire\Components\Profile\Update;
use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::name('auth.')->group(function() {
        Route::get('signin', Signin::class)->name('signin');
        Route::get('signup', Signup::class)->name('signup');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', Home::class)->name('home');

    Route::prefix('profile')->group(function () {
       Route::name('profile.')->group(function() {
            Route::get('/', Update::class)->name('home');
            Route::get('settings', Settings::class)->name('settings');
       });
    });

});



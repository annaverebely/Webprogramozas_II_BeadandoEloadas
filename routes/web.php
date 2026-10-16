<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use App\Http\Controllers\SutiCrudController;

// Főoldal a React Starter Kit helyett
Route::get('/', function () { return view('fooldal'); })->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {return Inertia::render('dashboard');})->name('dashboard');
    Route::get('user', function () { return view('user'); })->name("user");
    Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
});

//admin útv
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('crud', SutiCrudController::class)
        ->parameters(['crud' => 'suti'])
        ->only(['index']);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('exercise1', function () { return view('view1'); });
Route::get('introduction', function () { return view('introduction'); });


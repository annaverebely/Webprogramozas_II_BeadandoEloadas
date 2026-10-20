<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use App\Http\Controllers\SutiCrudController;
use App\Http\Controllers\ArApiController;

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
        ->except(['show']);
});

// React menü

Route::get('react', function () { return view('react'); })->name('react');
Route::prefix('api')->group(function () {
    Route::get('arak', [ArApiController::class, 'index']);
    Route::get('sutik', [ArApiController::class, 'sutik']);

    
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('arak', [ArApiController::class, 'store']);
        Route::put('arak/{ar}', [ArApiController::class, 'update']);
        Route::delete('arak/{ar}', [ArApiController::class, 'destroy']);
    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('exercise1', function () { return view('view1'); });
Route::get('introduction', function () { return view('introduction'); });


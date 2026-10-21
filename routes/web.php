<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;

// Főoldal: a React Starter Kit helyett saját kezdőoldalunk
Route::get('/', function () { return view('fooldal'); })->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {return Inertia::render('dashboard');})->name('dashboard');
    Route::get('user', function () { return view('user'); })->name("user");
    Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('exercise1', function () { return view('view1'); });
Route::get('introduction', function () { return view('introduction'); });

Route::get('adatbazis', 'App\Http\Controllers\AdatbazisController@index');

Route::get('kapcsolat', 'App\Http\Controllers\KapcsolatController@index');
Route::post('kapcsolat', 'App\Http\Controllers\KapcsolatController@store');

Route::get('uzenetek', 'App\Http\Controllers\UzenetekController@index')->middleware('auth');

Route::get('diagram', 'App\Http\Controllers\DiagramController@index');

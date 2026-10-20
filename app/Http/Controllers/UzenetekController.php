<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;

class UzenetekController extends Controller
{
    public function index()
    {
        $uzenetek = Uzenet::orderBy('created_at', 'desc')->get();

        return view('uzenetek', compact('uzenetek'));
    }
}

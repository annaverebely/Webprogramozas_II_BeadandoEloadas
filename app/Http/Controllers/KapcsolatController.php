<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;
use Illuminate\Http\Request;

class KapcsolatController extends Controller
{
    public function index()
    {
        return view('kapcsolat');
    }

    public function store(Request $request)
    {
        $adatok = $request->validate([
            'nev'    => 'required|string|min:3|max:100',
            'email'  => 'required|email|max:150',
            'targy'  => 'required|string|min:3|max:150',
            'uzenet' => 'required|string|min:10|max:2000',
        ], [
            'required' => 'A(z) :attribute mező kitöltése kötelező.',
            'min'      => 'A(z) :attribute legalább :min karakter legyen.',
            'max'      => 'A(z) :attribute legfeljebb :max karakter lehet.',
            'email'    => 'Érvényes e-mail-címet adjon meg.',
        ], [
            'nev'    => 'név',
            'email'  => 'e-mail',
            'targy'  => 'tárgy',
            'uzenet' => 'üzenet',
        ]);

        Uzenet::create($adatok);

        return redirect('/kapcsolat')->with('success', 'Köszönjük, üzenetét elküldtük!');
    }
}
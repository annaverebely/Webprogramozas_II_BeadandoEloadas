<?php

namespace App\Http\Controllers;

use App\Models\Suti;

class AdatbazisController extends Controller
{
    public function index()
    {
        $sutik = Suti::with(['arak', 'tartalmak'])->orderBy('tipus')->orderBy('nev')->get();

        $mentesNevek = [
            'G'  => 'gluténmentes',
            'L'  => 'laktózmentes',
            'HC' => 'hozzáadott cukor nélkül',
            'Te' => 'tejmentes',
            'To' => 'tojásmentes',
            'É'  => 'élesztőmentes',
        ];

        return view('adatbazis', compact('sutik', 'mentesNevek'));
    }
}

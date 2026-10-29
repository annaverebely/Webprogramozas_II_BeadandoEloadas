<?php

namespace App\Http\Controllers;

use App\Models\Suti;
use App\Models\Tartalom;
use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    public function index()
    {
        // 1. diagram: hány sütemény van az egyes típusokból (suti tábla)
        $tipusok = Suti::select('tipus', DB::raw('count(*) as db'))
            ->groupBy('tipus')
            ->orderBy('db', 'desc')
            ->get();

        // 2. diagram: hány sütemény rendelkezik az egyes mentességekkel (tartalom tábla)
        $mentessegek = Tartalom::select('mentes', DB::raw('count(*) as db'))
            ->groupBy('mentes')
            ->orderBy('db', 'desc')
            ->get();

        $mentesNevek = [
            'G'  => 'gluténmentes',
            'L'  => 'laktózmentes',
            'HC' => 'hozzáadott cukor nélkül',
            'Te' => 'tejmentes',
            'To' => 'tojásmentes',
            'É'  => 'élesztőmentes',
        ];

        // A Chart.js-nek két tömb kell: a feliratok (labels) és a számok (data)
        $tipusCimkek = $tipusok->pluck('tipus');
        $tipusDarab  = $tipusok->pluck('db');

        $mentesCimkek = $mentessegek->map(fn ($m) => $mentesNevek[$m->mentes] ?? $m->mentes);
        $mentesDarab  = $mentessegek->pluck('db');

        return view('diagram', compact('tipusCimkek', 'tipusDarab', 'mentesCimkek', 'mentesDarab'));
    }
}

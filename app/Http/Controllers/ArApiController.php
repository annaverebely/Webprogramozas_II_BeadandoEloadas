<?php

namespace App\Http\Controllers;

use App\Models\Ar;
use App\Models\Suti;

// JSON API a React menünek

class ArApiController extends Controller
{
    // GET /api/arak – összes ár
    public function index()
    {
        return Ar::with('suti:id,nev')->orderBy('id')->get()
            ->map(fn (Ar $ar) => $this->json($ar));
    }

    // GET /api/sutik
    public function sutik()
    {
        return Suti::orderBy('nev')->get(['id', 'nev', 'tipus']);
    }

    // JSON ár
    private function json(Ar $ar): array
    {
        return [
            'id' => $ar->id,
            'suti_id' => $ar->suti_id,
            'suti_nev' => $ar->suti?->nev,
            'ertek' => $ar->ertek,
            'egyseg' => $ar->egyseg,
        ];
    }
}

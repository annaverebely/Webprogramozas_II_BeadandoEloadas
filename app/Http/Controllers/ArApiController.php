<?php

namespace App\Http\Controllers;

use App\Models\Ar;
use App\Models\Suti;
use Illuminate\Http\Request;

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

    // POST
    public function store(Request $request)
    {
        $ar = Ar::create($this->validalt($request));

        return response()->json($this->json($ar->load('suti')), 201);
    }

    // PUT /api/arak/{ar} – ár módosítás (admin)
    public function update(Request $request, Ar $ar)
    {
        $ar->update($this->validalt($request));

        return $this->json($ar->load('suti'));
    }

    // DELETE /api/arak/{ar} – ár törlés (admin)
    public function destroy(Ar $ar)
    {
        $ar->delete();

        return response()->noContent();
    }

    // validálás
    private function validalt(Request $request): array
    {
        return $request->validate([
            'suti_id' => 'required|integer|exists:suti,id',
            'ertek' => 'required|integer|min:1|max:1000000',
            'egyseg' => 'required|string|max:30',
        ], [
            'suti_id.required' => 'Válasszon süteményt.',
            'suti_id.exists' => 'Nincs ilyen sütemény.',
            'ertek.required' => 'Az ár megadása kötelező.',
            'ertek.integer' => 'Az ár egész szám legyen.',
            'ertek.min' => 'Az ár legalább 1 Ft legyen.',
            'ertek.max' => 'Az ár legfeljebb 1 000 000 Ft lehet.',
            'egyseg.required' => 'Az egység megadása kötelező.',
            'egyseg.max' => 'Az egység legfeljebb 30 karakter lehet.',
        ]);
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

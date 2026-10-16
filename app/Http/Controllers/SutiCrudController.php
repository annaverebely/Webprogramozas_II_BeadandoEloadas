<?php

namespace App\Http\Controllers;

use App\Models\Suti;
use Illuminate\Http\Request;

// tananyag (PersonController, 5–6. CRUD fejezet)
class SutiCrudController extends Controller
{
    // Read
    public function index()
    {
        $sutik = Suti::withCount('arak')->orderBy('id')->paginate(15);

        return view('crud.index', compact('sutik'));
    }

    // Create űrlap
    public function create()
    {
        return view('crud.create', ['tipusok' => $this->tipusok()]);
    }

    // Create mentése
    public function store(Request $request)
    {
        $adatok = $this->validalt($request);

        try {
            $suti = Suti::create($adatok);
            
            $utolsoOldal = (int) ceil(Suti::count() / 15);

            return redirect()->route('crud.index', ['page' => $utolsoOldal])
                ->with('success', "A(z) „{$suti->nev}” sütemény felvétele sikerült.");
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('failed', 'A sütemény felvétele nem sikerült.');
        }
    }

    // Update
    public function edit(Suti $suti)
    {
        return view('crud.edit', ['suti' => $suti, 'tipusok' => $this->tipusok()]);
    }

    // Update mentés
    public function update(Request $request, Suti $suti)
    {
        $adatok = $this->validalt($request);

        try {
            $suti->update($adatok);

            return redirect()->to($this->vissza($request))
                ->with('success', "A(z) „{$suti->nev}” sütemény adatai módosultak.");
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('failed', 'A módosítás nem sikerült.');
        }
    }

    // Delete
    public function destroy(Suti $suti)
    {
        try {
            $suti->delete();

            return redirect()->back()->with('success', "A(z) „{$suti->nev}” sütemény törölve.");
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'A sütemény törlése nem sikerült.');
        }
    }

    
    private function validalt(Request $request): array
    {
        $adatok = $request->validate([
            'nev' => 'required|string|max:100',
            'tipus' => 'required|string|max:50',
        ], [
            'nev.required' => 'A név megadása kötelező.',
            'nev.max' => 'A név legfeljebb 100 karakter lehet.',
            'tipus.required' => 'A típus megadása kötelező.',
            'tipus.max' => 'A típus legfeljebb 50 karakter lehet.',
        ]);
        
        $adatok['dijazott'] = $request->boolean('dijazott');

        return $adatok;
    }

    
    private function tipusok()
    {
        return Suti::select('tipus')->distinct()->orderBy('tipus')->pluck('tipus');
    }

    
    private function vissza(Request $request): string
    {
        $url = (string) $request->input('vissza');

        return str_starts_with($url, route('crud.index')) ? $url : route('crud.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Suti;

// tananyag alapjánzet)
class SutiCrudController extends Controller
{

    public function index()
    {
        
        $sutik = Suti::withCount('arak')->orderBy('id')->paginate(15);

        return view('crud.index', compact('sutik'));
    }
}

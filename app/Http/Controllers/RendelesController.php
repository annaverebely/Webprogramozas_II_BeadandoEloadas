<?php

namespace App\Http\Controllers;

use App\Services\RendelesKalkulator;
use Illuminate\Http\Request;
use InvalidArgumentException;

class RendelesController extends Controller
{
    public function __construct(private readonly RendelesKalkulator $kalkulator)
    {
    }

    public function index()
    {
        return view('teszt', [
            'egysegar' => 1200, 'mennyiseg' => 1, 'kedvezmeny' => 0, 'hazhoz' => false,
            'eredmeny' => null, 'hiba' => null,
        ]);
    }

    public function szamol(Request $request)
    {
        $egysegar   = (int) $request->input('egysegar');
        $mennyiseg  = (int) $request->input('mennyiseg');
        $kedvezmeny = (int) $request->input('kedvezmeny');
        $hazhoz     = $request->boolean('hazhoz');

        $adatok = compact('egysegar', 'mennyiseg', 'kedvezmeny', 'hazhoz');
        $adatok['eredmeny'] = null;
        $adatok['hiba'] = null;

        try {
            $resz = $this->kalkulator->reszosszeg($egysegar, $mennyiseg);
            $levonas = $this->kalkulator->kedvezmeny($resz, $kedvezmeny);
            $adatok['eredmeny'] = [
                'reszosszeg' => $resz,
                'kedvezmeny' => $levonas,
                'szallitas'  => $this->kalkulator->szallitasiDij($resz - $levonas, $hazhoz),
                'vegosszeg'  => $this->kalkulator->vegosszeg($egysegar, $mennyiseg, $kedvezmeny, $hazhoz),
            ];
        } catch (InvalidArgumentException $e) {
            $adatok['hiba'] = $e->getMessage();
        }

        return view('teszt', $adatok);
    }
}

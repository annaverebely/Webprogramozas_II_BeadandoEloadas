<?php

namespace App\Services;

use InvalidArgumentException;

class RendelesKalkulator
{
    // Ennyi Ft feletti rendelésnél ingyenes a házhozszállítás
    public const INGYENES_SZALLITAS_HATAR = 10000;
    public const SZALLITASI_DIJ = 990;
    public const MAX_KEDVEZMENY = 50;

    // Részösszeg: egységár × mennyiség
    public function reszosszeg(int $egysegar, int $mennyiseg): int
    {
        if ($egysegar <= 0) {
            throw new InvalidArgumentException('Az egységárnak pozitívnak kell lennie!');
        }
        if ($mennyiseg < 1) {
            throw new InvalidArgumentException('Legalább 1 darabot kell rendelni!');
        }

        return $egysegar * $mennyiseg;
    }

    // A kedvezmény összege forintban (0–50%), egész forintra kerekítve
    public function kedvezmeny(int $osszeg, int $szazalek): int
    {
        if ($szazalek < 0 || $szazalek > self::MAX_KEDVEZMENY) {
            throw new InvalidArgumentException('A kedvezmény 0 és 50% között lehet!');
        }

        return (int) round($osszeg * $szazalek / 100);
    }

    // Szállítási díj: helyben átvételnél 0, házhozszállításnál 990 Ft,
    // 10 000 Ft-tól ingyenes
    public function szallitasiDij(int $osszeg, bool $hazhoz): int
    {
        if (! $hazhoz || $osszeg >= self::INGYENES_SZALLITAS_HATAR) {
            return 0;
        }

        return self::SZALLITASI_DIJ;
    }

    // Végösszeg: részösszeg - kedvezmény + szállítási díj
    public function vegosszeg(int $egysegar, int $mennyiseg, int $szazalek, bool $hazhoz): int
    {
        $resz = $this->reszosszeg($egysegar, $mennyiseg);
        $kedvezmenyes = $resz - $this->kedvezmeny($resz, $szazalek);

        return $kedvezmenyes + $this->szallitasiDij($kedvezmenyes, $hazhoz);
    }
}

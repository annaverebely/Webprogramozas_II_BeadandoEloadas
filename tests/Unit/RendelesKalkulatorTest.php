<?php

namespace Tests\Unit;

use App\Services\RendelesKalkulator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class RendelesKalkulatorTest extends TestCase
{
    private RendelesKalkulator $kalkulator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->kalkulator = new RendelesKalkulator();
    }

    public function test_reszosszeg(): void
    {
        $this->assertSame(3600, $this->kalkulator->reszosszeg(1200, 3));
    }

    public function test_reszosszeg_nulla_mennyiseg_kivetelt_dob(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Legalább 1 darabot kell rendelni!');
        $this->kalkulator->reszosszeg(1200, 0);
    }

    public function test_reszosszeg_negativ_egysegar_kivetelt_dob(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->kalkulator->reszosszeg(-500, 2);
    }

    public function test_kedvezmeny_kerekites(): void
    {
        $this->assertSame(500, $this->kalkulator->kedvezmeny(5000, 10));
        $this->assertSame(185, $this->kalkulator->kedvezmeny(1234, 15)); 
    }

    public function test_kedvezmeny_tul_nagy_kivetelt_dob(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A kedvezmény 0 és 50% között lehet!');
        $this->kalkulator->kedvezmeny(5000, 60);
    }

    public function test_szallitas_helyben_atvetelnel_ingyenes(): void
    {
        $this->assertSame(0, $this->kalkulator->szallitasiDij(3000, false));
    }

    public function test_szallitas_hatar_alatt_es_felett(): void
    {
        $this->assertSame(990, $this->kalkulator->szallitasiDij(9999, true));
        $this->assertSame(0, $this->kalkulator->szallitasiDij(10000, true));
    }

    public function test_vegosszeg_kedvezmennyel_es_szallitassal(): void
    {
        // 3 × 1200 = 3600, 10% kedvezmény = 360 -> 3240, + 990 szállítás = 4230
        $this->assertSame(4230, $this->kalkulator->vegosszeg(1200, 3, 10, true));
    }
}
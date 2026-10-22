<?php

namespace Tests\Feature;

use Tests\TestCase;

class RendelesControllerTest extends TestCase
{
    public function test_teszt_oldal_megjelenik_az_urlappal(): void
    {
        $this->get('/teszt')
            ->assertOk()
            ->assertSee('Rendelés-kalkulátor')
            ->assertSee('name="egysegar"', false)
            ->assertSee('name="mennyiseg"', false)
            ->assertSee('name="kedvezmeny"', false);
    }

    public function test_szamolas_kedvezmennyel_es_szallitassal(): void
    {
        $this->post('/teszt', ['egysegar' => 1200, 'mennyiseg' => 3, 'kedvezmeny' => 10, 'hazhoz' => 1])
            ->assertOk()
            ->assertSee('3 600 Ft')
            ->assertSee('-360 Ft')
            ->assertSee('990 Ft')
            ->assertSee('4 230 Ft');
    }

    public function test_ingyenes_szallitas_10000_ft_felett(): void
    {
        $this->post('/teszt', ['egysegar' => 5500, 'mennyiseg' => 2, 'kedvezmeny' => 0, 'hazhoz' => 1])
            ->assertOk()
            ->assertSee('11 000 Ft')
            ->assertViewHas('eredmeny', fn ($eredmeny) => $eredmeny['szallitas'] === 0);
    }

    public function test_nulla_mennyiseg_hibauzenetet_ad(): void
    {
        $this->post('/teszt', ['egysegar' => 1200, 'mennyiseg' => 0, 'kedvezmeny' => 0])
            ->assertOk()
            ->assertSee('Legalább 1 darabot kell rendelni!');
    }

    public function test_tul_nagy_kedvezmeny_hibauzenetet_ad(): void
    {
        $this->post('/teszt', ['egysegar' => 1200, 'mennyiseg' => 2, 'kedvezmeny' => 80])
            ->assertOk()
            ->assertSee('A kedvezmény 0 és 50% között lehet!');
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArSeeder extends Seeder
{
    public function run(): void
    {
        $sorok = file(database_path('seeders/data/ar.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_shift($sorok);

        foreach ($sorok as $sor) {
            $sor = str_replace(["\u{FEFF}", "\u{200B}"], '', $sor);
            $mezok = array_map('trim', explode("\t", $sor));

            DB::table('ar')->insert([
                'id' => $mezok[0],
                'suti_id' => $mezok[1],
                'ertek' => $mezok[2],
                'egyseg' => $mezok[3] !== '' ? $mezok[3] : 'db',
            ]);
        }
    }
}

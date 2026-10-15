<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SutiSeeder extends Seeder
{
    public function run(): void
    {
        //Beolvassa a fájlt egy tömbbe, soronként egy elemmel
        $sorok = file(database_path('seeders/data/suti.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        //Eldobja az első sort, a fejlécet
        array_shift($sorok);

        //Végigmegy a süteményeken
        foreach ($sorok as $sor) {

            //Kitörli a láthatatlan karaktereket
            $sor = str_replace(["\u{FEFF}", "\u{200B}"], '', $sor);

            //Levágja a szóközöket
            $mezok = array_map('trim', explode("\t", $sor));

            DB::table('suti')->insert([
                'id' => $mezok[0],
                'nev' => $mezok[1],
                'tipus' => $mezok[2],
                'dijazott' => $mezok[3] != '0',
            ]);
        }
    }
}
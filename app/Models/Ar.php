<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ar extends Model
{
    protected $table = 'ar';

    // a React menü
    protected $fillable = ['suti_id', 'ertek', 'egyseg'];

    public function suti()
    {
        return $this->belongsTo(Suti::class);
    }
}
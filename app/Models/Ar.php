<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ar extends Model
{
    protected $table = 'ar';

    public function suti()
    {
        return $this->belongsTo(Suti::class);
    }
}
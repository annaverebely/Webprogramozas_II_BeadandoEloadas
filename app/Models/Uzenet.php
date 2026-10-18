<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uzenet extends Model
{
    protected $table = 'uzenet';

    protected $fillable = ['nev', 'email', 'targy', 'uzenet'];
}
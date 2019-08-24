<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menace extends Model
{
    protected $fillable = [
        'categorie_id',
        'signature',
        'nom_menace'
    ];
}

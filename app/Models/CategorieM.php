<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieM extends Model
{
    protected $fillable = [
        'libelle_categorie',
        'description'
    ];
}

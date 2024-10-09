<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode',
        'nombre_epaves_enregistrees',
        'nombre_epaves_recuperees',
        'rapports_generes',
    ];
}

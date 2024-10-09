<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapatriement extends Model
{
    protected $fillable = [
        'epave_id',
        'gare_recuperation',
        'nom_client',
        'prenom_client',
        'cin_client',
        'email_client',
        'telephone_client',
        'od_client',
        'train_client',
        'date_heure_voyage',
        'copie_billet',
        'statut'
    ];

    public function epave()
    {
        return $this->belongsTo(Epave::class);
    }
}

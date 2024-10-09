<?php

namespace App\Models;

use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Epave extends Model
{
    use HasFactory;


    protected $fillable = [
        'categorie',
        'type_lieu_decouverte',
        'lieu_decouverte',
        'date_heure_decouverte',
        'description',
        'localisation',
        'couleur',
        'dimensions',
        'signes_distinctifs',
        'photos',
        'statut',
        'uuid',
        'user_id'
    ];

    protected $casts = [
        'photos' => 'array',
        'date_heure_decouverte' => 'datetime',
    ];
    public function actions()
    {
        return $this->hasMany(Action::class);
    }
    // Méthode boot pour générer automatiquement un UUID lors de la création d'une nouvelle épave
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = strtoupper(Str::random(10)); // Génération d'un identifiant aléatoire de 10 caractères
            }
        });
    }
    // Une épave appartient à un utilisateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}

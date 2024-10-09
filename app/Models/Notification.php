<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'type_notification',
        'contenu',
        'date_heure_envoi',
    ];

    protected $casts = [
        'date_heure_envoi' => 'datetime',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

}

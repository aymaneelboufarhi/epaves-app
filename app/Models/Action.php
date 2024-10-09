<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'epave_id',
        'action',
        'date_heure_action',
        'details_supplementaires',
    ];

    protected $casts = [
        'date_heure_action' => 'datetime',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function epave()
    {
        return $this->belongsTo(Epave::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'revenu',
        'date_N',
        'lieu_N',
        'email',
        'num_tlf',
        'adresse',
        'wilaya',
        'commune',
        'daira',
        'categorie',
        'statut',
        'user_id',
    ];

    protected $casts = [
        'date_N' => 'date',
    ];

    public $timestamps = false;
}

<?php

namespace App\Models;

use App\Models\Compte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_client';


    protected $fillable = [
        'nom',
        'prenom',
        'revenu',
        'sexe',
        'date_n',
        'lieu_n',
        'email',
        'num_tlf',
        'adresse',
        'wilaya',
        'commune',
        'daira',
        'category',
        'type',
        'forme_juridique_id',
        'denomination',
        'activite',
        'status',
        'user_id',
    ];

    public function comptes()
    {
        return $this->hasMany(Compte::class, 'id_client');
    }

    public function hasActiveAccount()
    {
        return $this->compte && $this->compte->statut === 'actif';
    }
    
    public function formeJuridique()
    {
        return $this->belongsTo(FormeJuridique::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

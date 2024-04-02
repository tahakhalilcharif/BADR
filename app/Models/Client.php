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
        'sexe',
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

    /**
     * Define a one-to-one relationship with Compte model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */


    public function comptes()
    {
        return $this->hasMany(Compte::class, 'id_client');
    }

    public function hasActiveAccount()
    {
        return $this->compte && $this->compte->statut === 'actif';
    }

    public function showComptes(Request $request)
    {
        $client = $request->user()->client;
        $comptes = $client->comptes;

        return view('comptes.show', compact('comptes'));
    }
}

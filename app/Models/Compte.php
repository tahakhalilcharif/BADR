<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compte extends Model
{
    use HasFactory;

    protected $table = 'comptes';

    protected $primaryKey = 'id_cmpt';

    protected $fillable = [
        'id_client',
        'solde',
        'date_ouv',
        'derniere_trn',
        'statut',
        'interdit_au_credit',
        'interdit_au_debit',
        'banque',
        'agence',
        'num_serie',
        'cle',
        'num_cmt',
        'classe',
    ];

    public $timestamps = false;
    
    //Get the client associated with the account.
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function hasActiveAccount()
    {
        return $this->statut === 'actif';
    }

    public function ActivateAccount(){
        return $this->statut='actif';
    }

    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_compte');
    }


    public function classeLibelle()
    {
        $label = ClasseCompte::where('classe' ,$this->classe)->first() ;
        return $label->label;
    }

}

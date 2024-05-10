<?php

namespace App\Models;

use App\Models\Carte;
use App\Models\Compte;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produits';

    protected $primaryKey = 'id_prd';

    protected $fillable = [
        'id_carte',
        'id_compte',
        'date_expiration',
        'id_demande',
        'statut',
    ];

    public $timestamps = false;

    /**
     * Get the card associated with the product.
     */
    public function carte()
    {
        return $this->belongsTo(Carte::class, 'id_carte');
    }

    /**
     * Get the account associated with the product.
     */
    public function compte()
    {
        return $this->belongsTo(Compte::class, 'id_compte');
    }

    /**
     * Get the demand associated with the product.
     */
    public function demande()
    {
        return $this->belongsTo(Demande::class, 'id_demande');
    }
    
}
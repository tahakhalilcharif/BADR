<?php

namespace App\Models;

use App\Models\Carte;
use App\Models\Client;
use App\Models\Compte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

    protected $table = 'demandes';

    protected $primaryKey = 'id_demande';

    protected $fillable = [
        'id_client',
        'id_carte',
        'id_compte',
        'date_demande',
        'statut',
    ];

    public $timestamps = false;
    
    /**
     * Get the client associated with the demand.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    /**
     * Get the card associated with the demand.
     */
    public function carte()
    {
        return $this->belongsTo(Carte::class, 'id_carte');
    }

    /**
     * Get the account associated with the demand.
     */
    public function compte()
    {
        return $this->belongsTo(Compte::class, 'id_compte');
    }
}

<?php

namespace App\Models;

use App\Models\Compte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $primaryKey = 'trn_ref_no';

    protected $fillable = [
        'id_compte_source',
        'id_compte_destination',
        'montant',
        'type',
        'date_trn',
    ];

    public $timestamps = false;

    /**
     * Get the source account of the transaction.
     */
    public function compteSource()
    {
        return $this->belongsTo(Compte::class, 'id_compte_source');
    }

    /**
     * Get the destination account of the transaction.
     */
    public function compteDestination()
    {
        return $this->belongsTo(Compte::class, 'id_compte_destination');
    }
}

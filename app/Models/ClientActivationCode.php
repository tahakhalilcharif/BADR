<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientActivationCode extends Model
{
    use HasFactory;

    protected $table = 'client_activation_codes';

    protected $fillable = [
        'id_client',
        'activation_code',
    ];

    public $timestamps = false;

    // Define the relationship with the Client model
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
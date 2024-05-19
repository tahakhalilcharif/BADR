<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientActivationCode extends Model
{
    use HasFactory;

    protected $table = 'client_activation_codes';

    protected $fillable = [
        'user_id',
        'activation_code',
        'is_activated',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
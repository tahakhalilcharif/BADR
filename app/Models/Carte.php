<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;

    protected $table = 'cartes';

    protected $primaryKey = 'id_carte';

    protected $fillable = [
        'libelle',
        'plafond_atm',
        'plafond_internet',
        'plafond_poste',
    ];
}
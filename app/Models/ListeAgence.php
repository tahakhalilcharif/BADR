<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeAgence extends Model
{
    protected $table = 'liste_agence';
    protected $fillable = ['code_agence', 'nom_agence', 'code_wilaya'];
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nom', 'prenom', 'role'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

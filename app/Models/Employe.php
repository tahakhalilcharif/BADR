<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employe';

    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'role',
    ];

    public $timestamps = false;

    //Get the user associated with the employee.  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

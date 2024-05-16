<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Employee;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function client()
    {
        return $this->hasOne(Client::class,'user_id');
    }

    public function isClient(){
        return $this->client()->exists();
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function isEmployee()
    {
        return $this->employee()->exists();
    }
    
    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerificationNotification);
    }
    
    
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'country_code',
        'phone_number',
        'otp',
        'otp_expires_at',
        'is_verified',
        'role',
        'role1',
        'email',
        'email_verified_at',
        'password',
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
     * 
     */
    protected $casts = [
        'otp_expires_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    public function entrepreneur()
    {
        return $this->hasOne(Entrepreneur::class);
    }

    public function investor()
    {
        return $this->hasOne(Investor::class);
    }

    public function interestsGiven()
    {
        return $this->hasMany(Interest::class, 'investor_id');
    }

    public function isInvestor()
    {
        return $this->role === 'investor'; // Adjust 'investor' to match your database value
    }

}
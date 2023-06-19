<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

     /**
     * Les attributs qu'on ne pas inserer
     *
     * @var array<int, string>
     */
    protected $guarded = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //     Encryption keys generated successfully.
    // Personal access client created successfully.
    // Client ID: 1
    // Client secret: hIVZ0Kpu44jD1CWuo4PIx6wR1SmUNRsgVXhshU8I
    // Password grant client created successfully.
    // Client ID: 2
    // Client secret: L8haNLqHxbiT1l0kU5u2wczYGiXNhccunEbesxMh
}

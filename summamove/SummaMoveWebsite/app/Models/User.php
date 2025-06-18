<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Velden die mass assignable zijn.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Velden die verborgen zijn voor arrays/json.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Velden die automatisch gecast worden.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relatie naar prestaties van deze gebruiker.
     */
    public function performances()
    {
        return $this->hasMany(Performance::class);
    }
}

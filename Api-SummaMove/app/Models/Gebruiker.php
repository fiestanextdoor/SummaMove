<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gebruiker extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'gebruikers';

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = ['password'];

    public function prestaties()
    {
        return $this->hasMany(Prestatie::class);
    }
}


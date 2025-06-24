<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Gebruiker extends Authenticatable
{
    use Notifiable;

    protected $table = 'gebruikers';

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];

    public function prestaties()
    {
        return $this->hasMany(Prestatie::class, 'gebruiker_id');
    }
}

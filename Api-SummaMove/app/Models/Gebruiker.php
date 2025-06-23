<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Gebruiker extends Authenticatable
{
    protected $table = 'gebruikers';  // jouw custom tabel

    protected $fillable = ['naam', 'email', 'wachtwoord']; // pas aan naar jouw kolommen

    protected $hidden = ['wachtwoord', 'remember_token'];

    protected $primaryKey = 'id';  // meestal id, pas aan indien anders

    // Pas wachtwoord kolomnaam aan, als het niet 'password' is
    public function getAuthPassword()
    {
        return $this->wachtwoord;
    }
}

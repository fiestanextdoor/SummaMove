<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // ...

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean', // Voeg dit toe
    ];

    // Optioneel: helper methode voor admin check
    public function isAdmin()
    {
        return $this->is_admin;
    }
}

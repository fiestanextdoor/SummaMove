<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gebruiker extends Model
{
    protected $table = 'gebruikers'; // je eigen tabelnaam

    protected $fillable = ['username']; // pas aan met jouw kolommen

    // Relatie: een gebruiker kan meerdere prestaties hebben
    public function prestaties()
    {
        return $this->hasMany(Prestatie::class, 'gebruiker_id');
    }
}

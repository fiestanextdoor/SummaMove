<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestatie extends Model
{
    protected $fillable = ['gebruiker_id', 'oefening_id', 'aantal', 'datum'];



    public function gebruiker()
    {
        return $this->belongsTo(Gebruiker::class, 'gebruiker_id');
    }

    // Relatie met oefening (als je die hebt)
    public function oefening()
    {
        return $this->belongsTo(Oefening::class);
    }
}

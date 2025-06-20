<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestatie extends Model
{
    protected $fillable = ['gebruiker_id', 'oefening_id', 'starttijd', 'eindtijd', 'datum', 'aantal'];

    public function gebruiker()
{
    return $this->belongsTo(User::class, 'gebruiker_id');
}


    public function oefening()
    {
        return $this->belongsTo(Oefening::class);
    }
}

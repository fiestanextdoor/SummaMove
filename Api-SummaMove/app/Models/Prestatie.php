<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestatie extends Model
{
    use HasFactory;

    protected $fillable = [
        'gebruiker_id',
        'oefening_id',
        'datum',
        'starttijd',
        'eindtijd',
        'aantal',
    ];

    public function gebruiker()
    {
        return $this->belongsTo(Gebruiker::class);
    }

    public function oefening()
    {
        return $this->belongsTo(Oefening::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

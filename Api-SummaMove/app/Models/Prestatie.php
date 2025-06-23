<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestatie extends Model
{
    use HasFactory;

    protected $table = 'prestaties';

    protected $fillable = [
        'user_id',
        'oefening_id',
        'score',
    ];

    public function gebruiker()
    {
        return $this->belongsTo(Gebruiker::class, 'user_id');
    }

    public function oefening()
    {
        return $this->belongsTo(Oefening::class, 'oefening_id');
    }
}

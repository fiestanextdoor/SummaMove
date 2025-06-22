<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Oefening extends Model
{
    use HasFactory;

    protected $table = 'oefeningen';

    protected $fillable = [
        'naam',
        'beschrijving',
        'foto', 
    ];

    public function prestaties()
    {
        return $this->hasMany(Prestatie::class);
    }
}

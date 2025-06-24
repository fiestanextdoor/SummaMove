<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oefening extends Model
{
    protected $table = 'oefeningen';
    use HasFactory;

    protected $fillable = [
        'naam',
        'beschrijving',
    ];
}

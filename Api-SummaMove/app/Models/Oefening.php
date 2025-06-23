<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oefening extends Model
{
    protected $table = 'oefeningen';  

    protected $fillable = ['naam', 'beschrijving', 'foto']; 
}

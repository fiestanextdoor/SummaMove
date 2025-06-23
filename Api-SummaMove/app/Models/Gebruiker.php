<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gebruiker extends Model
{
    // Tabel naam als die niet standaard pluralisatie volgt:
    protected $table = 'gebruikers';

    // Als je primary key anders heet, definieer dat ook:
    // protected $primaryKey = 'id';

    // Als je timestamps niet gebruikt
    // public $timestamps = false;

    protected $fillable = [
        // vul in wat je wil kunnen mass assignen
        'naam', 'email', 'etc'
    ];
}

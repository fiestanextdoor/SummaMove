<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestatiesTable extends Migration
{
    public function up()
    {
        Schema::create('prestaties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gebruiker_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('oefening_id')->constrained('oefeningen')->onDelete('cascade');
            $table->date('datum');
            $table->time('starttijd');
            $table->time('eindtijd');
            $table->integer('aantal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestaties');
    }
}

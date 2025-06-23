<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOefeningenTable extends Migration
{
    public function up(): void
{
    Schema::create('oefeningen', function (Blueprint $table) {
        $table->id();
        $table->string('naam');
        $table->text('beschrijving')->nullable();
        $table->timestamps();
    });
}
    public function down()
    {
        Schema::dropIfExists('oefeningen');
    }
}

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration {
    public function up() {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description_nl');
            $table->text('description_en');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('exercises');
    }
}

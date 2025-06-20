<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('prestaties', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->after('id');
        $table->unsignedBigInteger('oefening_id')->after('user_id');
        $table->date('datum')->after('oefening_id');
        $table->time('starttijd')->after('datum');
        $table->time('eindtijd')->after('starttijd');
        $table->integer('aantal_keer')->default(1)->after('eindtijd');

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('oefening_id')->references('id')->on('oefeningen')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('prestaties', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropForeign(['oefening_id']);
        $table->dropColumn(['user_id', 'oefening_id', 'datum', 'starttijd', 'eindtijd', 'aantal_keer']);
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestaties', function (Blueprint $table) {
            //
        });
    }
};

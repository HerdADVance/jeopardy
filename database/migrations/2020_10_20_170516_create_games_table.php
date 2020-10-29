<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('round')->default(0);
            $table->unsignedBigInteger('host');
            $table->unsignedBigInteger('player_turn');
            $table->unsignedBigInteger('player_guess');
            //$table->unsignedBigInteger('board1_id');
            //$table->unsignedBigInteger('board2_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}

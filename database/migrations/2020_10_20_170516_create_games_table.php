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
            $table->unsignedBigInteger('active_question')->nullable();
            $table->string('active_text')->nullable();
            $table->boolean('clue_active')->default(false);
            $table->boolean('answer_active')->default(false);
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

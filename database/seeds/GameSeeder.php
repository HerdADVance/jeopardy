<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
        	[
        		'host' => 1,
                'round' => 1,
                'player_turn' => 1,
                'player_guess' => 1
        	]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [2,3,4,5];
        shuffle($users);

        DB::table('players')->insert([
        	[
        		'game_id' => 1,
        		'user_id' => $users[0],
                'order' => 1
        	],
        	[
        		'game_id' => 1,
        		'user_id' => $users[1],
                'order' => 2
        	],

[
        		'game_id' => 1,
        		'user_id' => $users[2],
                'order' => 3
        	],

[
        		'game_id' => 1,
        		'user_id' => $users[3],
                'order' => 4
        	],

        ]);

        DB::table('games')
            ->where('id', 1)
            ->update(['player_turn' => $users[0], 'player_guess' => $users[0]]);
    }
}

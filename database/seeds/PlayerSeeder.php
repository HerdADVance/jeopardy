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
        DB::table('players')->insert([
        	[
        		'game_id' => 1,
        		'user_id' => 2,
                'order' => 1
        	],
        	[
        		'game_id' => 1,
        		'user_id' => 3,
                'order' => 2
        	],

[
        		'game_id' => 1,
        		'user_id' => 4,
                'order' => 3
        	],

[
        		'game_id' => 1,
        		'user_id' => 5,
                'order' => 4
        	],

        ]);
    }
}

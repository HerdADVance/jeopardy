<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->insert([
        	[
        		'game_id' => 1,
                'round' => 1
        	],
            [
                'game_id' => 1,
                'round' => 2
            ],
            [
                'game_id' => 1,
                'round' => 3
            ]
        ]);
    }
}

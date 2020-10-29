<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	[
        		'board_id' => 1,
        		'order' => 1,
        		'title' => 'To Bill Brasky'
        	],
        	[
        		'board_id' => 1,
        		'order' => 2,
        		'title' => 'Historical Math'
        	],
        	[
        		'board_id' => 1,
        		'order' => 3,
        		'title' => 'Missing Common Bonds'
        	],
        	[
        		'board_id' => 1,
        		'order' => 4,
        		'title' => '16 Letter Words'
        	],
        	[
        		'board_id' => 1,
        		'order' => 5,
        		'title' => 'Rivers'
        	],
        	[
        		'board_id' => 1,
        		'order' => 6,
        		'title' => 'School By Athlete'
        	],[
        		'board_id' => 2,
        		'order' => 1,
        		'title' => 'Fuck You 2020'
        	],
        	[
        		'board_id' => 2,
        		'order' => 2,
        		'title' => 'Science'
        	],
        	[
        		'board_id' => 2,
        		'order' => 3,
        		'title' => 'Million Dollar Questions'
        	],
        	[
        		'board_id' => 2,
        		'order' => 4,
        		'title' => 'The Electoral College'
        	],
        	[
        		'board_id' => 2,
        		'order' => 5,
        		'title' => 'Before & After'
        	],
        	[
        		'board_id' => 2,
        		'order' => 6,
        		'title' => 'Country By Athlete'
        	],
            [
                'board_id' => 3,
                'order' => 1,
                'title' => 'Flags'
            ]

        ]);
    }
}

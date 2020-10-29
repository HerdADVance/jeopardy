<?php

use Illuminate\Database\Seeder;

class FinalQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('final_questions')->insert([
        	[
        		'game_id' => 1,
        		'clue' => "Test Clue",
        		'answer' => "Test Answer"
        	]
        ]);
    }
}

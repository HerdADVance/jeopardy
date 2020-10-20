<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
        	['question' => 'Ticket Issue #1: Question Here.'],
        	['question' => 'Ticket Issue #2: Another Question Here.'],
        ]);
    }
}

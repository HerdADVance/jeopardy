<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	// [
        	// 	'name' => 'Alex',
        	// 	'email' => 'alex@ballsoherd.com',
        	// 	'password' => Hash::make('vance')
        	// ],
         //    [
         //        'name' => 'Beverage',
         //        'email' => 'beverage@ballsoherd.com',
         //        'password' => Hash::make('beverage')
         //    ],
         //    [
         //        'name' => 'Chuy',
         //        'email' => 'chuy@ballsoherd.com',
         //        'password' => Hash::make('miller')
         //    ],
         //    [
         //        'name' => 'Cody',
         //        'email' => 'cody@ballsoherd.com',
         //        'password' => Hash::make('rohrig')
         //    ],
         //    [
         //        'name' => 'Whitt',
         //        'email' => 'whitt@ballsoherd.com',
         //        'password' => Hash::make('whitt')
         //    ],
            [
                'name' => 'Alex',
                'username' => 'alex',
                'password' => Hash::make('Se7en')
            ],
            [
                'name' => 'Beverage',
                'username' => 'beverage',
                'password' => Hash::make('browns')
            ],
            [
                'name' => 'Chuy',
                'username' => 'chuy',
                'password' => Hash::make('vikings')
            ],
            [
                'name' => 'Cody',
                'username' => 'cody',
                'password' => Hash::make('baker')
            ],
            [
                'name' => 'Whitt',
                'username' => 'whitt',
                'password' => Hash::make('feita')
            ]
        ]);
    }
}

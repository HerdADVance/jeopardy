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
            [
                'name' => 'Alex',
                'username' => 'alex',
                'password' => Hash::make('vance')
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

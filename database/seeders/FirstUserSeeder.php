<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //We created first user for admin with using seeder.
        DB::table('users')->insert([
           //'name' => 'admin',
           'email' => 'admin@admin.com',
           'password' => 'password',
        ]);
    }
}

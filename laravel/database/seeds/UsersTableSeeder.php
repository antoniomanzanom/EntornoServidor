<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => 'admin',
            "email"  => 'a@a.a',
            "password" => bcrypt('pestillo'),
            "role" => 'null',
            "surname" => 'admin',
            "nick" => 'ad',
            "image" => 'avatar/calvo.jpg',
        ]);
    }
}
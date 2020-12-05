<?php

use Illuminate\Database\Seeder;

class likesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            "user_id" => '1',
            "images_id"=>'1',

        ]);
    }
}

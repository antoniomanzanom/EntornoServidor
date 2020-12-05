<?php

use Illuminate\Database\Seeder;

class commentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            "user_id" => '1',
            "images_id"  => '1',
            "content" => 'Contenido del comentario',
        ]);
    }
}

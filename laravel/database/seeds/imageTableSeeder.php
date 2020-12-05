<?php

use Illuminate\Database\Seeder;

class imageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            "user_id" => '1',
            "image_path"  => 'imagenes/shurima_crest_icon.png',
            "description" => 'Descripcion de pepe',
        ]);
    }
}

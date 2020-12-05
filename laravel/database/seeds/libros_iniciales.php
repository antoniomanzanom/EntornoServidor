<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class libros_iniciales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('libros')->insert([
            "titulo" => 'La metaforsosis',
            "autor"  => 'Franz Kafka',
            "isbn"   => '111324242442',
            "descatalogado" => false,
            "reseña"  => '`éáíóèàñññññÇÑÇÇÇççççÇÇ`'
        ]);
        DB::table('libros')->insert([
            "titulo" => 'Cómo programar mal',
            "autor"  => 'Cristian Andrades',
            "isbn"   => '000222111727',
            "descatalogado" => true,
            "reseña"  => 'Es necesario saber programar mal para que nunca te contraten'
        ]);
    }
}

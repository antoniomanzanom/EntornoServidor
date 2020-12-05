<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(libros_iniciales::class);
        $this->call(imageTableSeeder::class);
        $this->call(likesTableSeeder::class);
        $this->call(commentsTableSeeder::class);
    }
}

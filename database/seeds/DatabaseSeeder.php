<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArtikelTableSeeder::class);
        $this->call(BahanResepTableSeeder::class);
        $this->call(LangkahMembuatTableSeeder::class);
        $this->call(ResepKategoriTableSeeder::class);
        $this->call(ResepTableSeeder::class);
    }
}

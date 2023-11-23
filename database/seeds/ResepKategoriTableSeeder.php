<?php

use App\Resep_kategori;
use Illuminate\Database\Seeder;

class ResepKategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Resep_kategori::class, 3)->create();
    }
}

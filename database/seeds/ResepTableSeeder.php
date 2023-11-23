<?php

use App\Resep;
use Illuminate\Database\Seeder;

class ResepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Resep::class, 5)->create();
    }
}

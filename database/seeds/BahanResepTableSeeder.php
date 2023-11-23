<?php

use App\BahanResep;
use Illuminate\Database\Seeder;

class BahanResepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BahanResep::class, 15)->create();
    }
}

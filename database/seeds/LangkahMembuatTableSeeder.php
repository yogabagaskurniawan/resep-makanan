<?php

use App\LangkahMembuat;
use Illuminate\Database\Seeder;

class LangkahMembuatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LangkahMembuat::class, 15)->create();
    }
}

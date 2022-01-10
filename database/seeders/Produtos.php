<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Produtos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Produtos::factory(100)->create();
    }
}

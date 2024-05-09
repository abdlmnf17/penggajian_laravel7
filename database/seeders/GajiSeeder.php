<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gaji::factory()->count(50)->create();
    }
}

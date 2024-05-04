<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;


class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::factory()->count(50)->create();
    }
}

<?php

namespace Database\Seeders;
use App\Models\Akun;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akun::create([
            'nm_akun' => 'Kas',
            'kd_akun' => 101,
            'jenis_akun' => 'Asset',
            'total' => 1000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Akun::create([
            'nm_akun' => 'Modal Pemilik',
            'kd_akun' => 301,
            'jenis_akun' => 'Modal',
            'total' => 1000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Akun::create([
            'nm_akun' => 'Utang Usaha',
            'kd_akun' => 201,
            'jenis_akun' => 'Kewajiban',
            'total' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Akun::create([
            'nm_akun' => 'Pendapatan Usaha',
            'kd_akun' => 401,
            'jenis_akun' => 'Pendapatan',
            'total' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Akun::create([
            'nm_akun' => 'Beban Lain',
            'kd_akun' => 501,
            'jenis_akun' => 'Beban',
            'total' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

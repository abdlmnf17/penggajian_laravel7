<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Guru;


class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Guru::class;
    public function definition()
    {
        return [
            'nm_guru' => $this->faker->name,
            'alamat' => $this->faker->address,
            'tgl_lahir' => $this->faker->date,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'guru_mapel' => $this->faker->word,
            'nm_jabatan' => $this->faker->jobTitle,
        ];
    }
}

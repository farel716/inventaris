<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nisn' => $this->faker->unique()->numerify('00########'),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'kelas' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'jurusan' => $this->faker->randomElement([
                'Teknik Informatika',
                'Akuntansi',
                'Multimedia',
                'Teknik Mesin',
                'Farmasi',
                'Perhotelan',
                'Administrasi Perkantoran'
            ]),
            'alamat' => $this->faker->address(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\faq>
 */
class AlumniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nama' => $this->faker->name(),
           'tahun_lulus' => $this->faker->year(),
           'kuliah' => $this->faker->word(),
           'tempat_kuliah' => $this->faker->company(),
           'pekerjaan' => $this->faker->jobTitle(),
           'tempat_kerja' => $this->faker->company(),
           'pesan' => $this->faker->paragraph(),
              'foto' => 'alumni/dummy.jpg', 
              
        ];
    }
}

<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileSekolah>
 */
class ProfilSekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(),
            'kategori' => $this->faker->word(),
            'isi' => $this->faker->paragraph(),
            'gambar' => 'profilsekolah/dummy.jpg',

        ];
    }
}

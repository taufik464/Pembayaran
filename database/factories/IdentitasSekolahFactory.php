<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IdentitasSekolah>
 */
class IdentitasSekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_sekolah' => $this->faker->company(),
            'npsn' => $this->faker->unique()->numerify('##########'),
            'alamat' => $this->faker->address(),
            'telepon' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
            'logo' => 'identitassekolah/dummy.jpg',
            'jam_operasi' => 'Senin - Jumat, 08:00 - 15:00',
        ];
    }
}

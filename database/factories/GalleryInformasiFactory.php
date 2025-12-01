<?php

namespace Database\Factories;

use App\Models\Information;
use App\Models\GalleryInformasi;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GalleryInformasi>
 */
class GalleryInformasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = GalleryInformasi::class;
    public function definition(): array
    {
        return [
            // Buat informasi baru secara otomatis jika belum ada
            'information_id' => Information::factory(),
            'image_path' => 'gallery/dummy.jpg',
        ];
    }
}

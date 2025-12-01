<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Information>
 */
class InformationFactory extends Factory
{
    protected $model = Information::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'category_id' => Category::factory(),
            'content' => $this->faker->word(),
        ];
    }
}

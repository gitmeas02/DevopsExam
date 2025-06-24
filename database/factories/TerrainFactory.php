<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Terrain>
 */
class TerrainFactory extends Factory
{
    
    protected $model = Terrain::class;

    public function definition()
    {
        return [
            'owner_id' => User::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'area_size' => $this->faker->randomFloat(2, 50, 1000),
            'price_per_day' => $this->faker->randomFloat(2, 10, 500),
            'available_from' => $this->faker->date,
            'available_to' => $this->faker->date,
            'is_available' => true,
            'main_image' => $this->faker->imageUrl(640, 480, 'nature', true),
        ];
    }
}

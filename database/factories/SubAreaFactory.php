<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubArea>
 */
class SubAreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'area_id' => null,
            'grupo_id' => null,
            'nombre' => fake()->name(),
            'status' => 1,
        ];
    }
}

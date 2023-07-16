<?php

namespace Database\Factories;

use App\Models\Cycle;
use Illuminate\Database\Eloquent\Factories\Factory;

class NiveauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'libelle' => $this->faker->sentence(),
            'cycle_id' =>  $this->faker->unique()->numberBetween(1, Cycle::count()),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Niveau;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClasseFactory extends Factory
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
            'niveau_id' =>  $this->faker->unique()->numberBetween(1, Niveau::count()),
        ];
    }
}

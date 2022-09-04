<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->bothify('???###'),
            'description' => $this->faker->paragraph(),
            'scpl' => $this->faker->text(30),
            'sks' => $this->faker->numberBetween(1,4),
            'status' => $this->faker->randomElement(['Universitas','Fakultas']),
            'for_level' => $this->faker->randomElement(['S1','S2','S3']),
            'type' => $this->faker->randomElement([0,1]),
        ];
    }
}
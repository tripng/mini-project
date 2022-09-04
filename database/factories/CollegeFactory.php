<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CollegeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->numerify('################'),
            'data_id' => 1,
            'email' => $this->faker->email(),
            'name' => $this->faker->name(),
            'birthday' => $this->faker->dateTimeBetween('1990-01-01', '2002-12-31')->format('d/m/Y'),
            'gender' => $this->faker->randomElement(['Laki-Laki','Perempuan']),
            'religion' => $this->faker->randomElement(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu']),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
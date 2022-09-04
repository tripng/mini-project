<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
  public function definition()
  {
    return [
      'nim' => $this->faker->randomNumber(5,true),
      'password' => bcrypt('secret'),
    ];
  }
}
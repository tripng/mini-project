<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    public function run()
    {   
        User::factory()->count(10)
                        ->state(new Sequence(
                            ['role' => 0,'nim' => 11111], 
                            ['role' => 1], 
                            ['role' => 1], 
                            ['role' => 1], 
                            ['role' => 1], 
                            ['role' => 1], 
                            ['role' => 1], 
                            ['role' => 1], 
                            ['role' => 1], 
                            ['role' => 1], 
                            ['role' => 1], 
                        ))
                        ->create();

        $this->call(CollegeSeeder::class);
        $this->call(DataSeeder::class);     
    }
}
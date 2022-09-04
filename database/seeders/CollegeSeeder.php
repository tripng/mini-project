<?php

namespace Database\Seeders;

use  App\Models\College;
use  App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        College::factory()
                    ->sequence(fn ($sequence) => [
                        'id' => $sequence->index+10,
                        'data_id' => $sequence->index+1,
                        'user_id' => $sequence->index+1
                    ])
                    ->count(10)
                    ->has(Course::factory()
                                    ->state(new Sequence(
                                        ['name' => 'Bahasa Indonesia'],
                                        ['name' => 'Bahasa Inggris'],
                                        ['name' => 'PKN'],
                                        ['name' => 'Kalkulus'],
                                        ['name' => 'Pemrograman Web'],
                                        ['name' => 'Jaringan Komputer'],
                                        ['name' => 'Sistem Kendali'],
                                        ['name' => 'Skripsi'],
                                        ['name' => 'Metodologi Penelitian'],
                                        ['name' => 'Kimia'],
                                    )) 
                    )
                    ->create();
    }
}
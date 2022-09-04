<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DataFactory extends Factory
{
    public function randomSeed(array $jurusan):string{
        return $this->faker->randomElement($jurusan);
    }

    public function definition()
    {
        $fakultas = $this->faker->randomElement(['Pertanian','Ekonomi','Hukum','Ilmu Sosial','Teknik','FMIPA','Kedokteran']);

        if($fakultas === 'Pertanian') $major = DataFactory::randomSeed(['Budidaya Pertanian','Kehutanan','Teknologi Pertanian']);
        else if($fakultas === 'Ekonomi') $major = DataFactory::randomSeed(['Manajemen','Akuntansi']);
        else if($fakultas === 'Hukum') $major = DataFactory::randomSeed(['Hukum Perkembangan Masyarakat','Hukum Internasional']);
        else if($fakultas === 'Ilmu Sosial') $major = DataFactory::randomSeed(['Sosiologi','Ilmu Komunikasi']);
        else if($fakultas === 'Teknik') $major = DataFactory::randomSeed(['Teknik Informatika','Teknik Sipil','Teknik Elektro']);
        else if($fakultas === 'FMIPA') $major = DataFactory::randomSeed(['Matematika','Fisika','Kimia','Biologi']);
        else $major = DataFactory::randomSeed(['Pendidikan Dokter','Ilmu Keperawatan']);

        return [
            'status' => $this->faker->randomElement(['Cuti','Aktif','Selesai','Non Aktif','Drop Out','Skorsing','Passing Out']),
            'generation' => $this->faker->numberBetween(2015,2022),
            'level_of_study' => $this->faker->randomElement(['S1','S2','S3']),
            'fakultas' => $fakultas,
            'major' => $major,
            'entrance' => $this->faker->randomElement(['SNMPTN','SBMPTN','MANDIRI']),
            'ipk' => $this->faker->randomFloat(1,2,4),
            'semester' => $this->faker->numberBetween(1,6),
        ];
    }
}
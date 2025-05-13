<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 10; $i++) { 
            Kelas::create([
                'kelas'       => $faker->randomElement(['Pemula', 'Menengah', 'Lanjutan']),
                'judul_kelas' => $faker->sentence(3),
                'rating'      => $faker->randomFloat(2, 3, 5),
                'deskripsi'   => $faker->paragraph(2),
            ]);
        }
    }
}

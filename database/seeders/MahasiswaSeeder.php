<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
   
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
            // insert data ke table mahasiswa menggunakan Faker
    		Mahasiswa::create([
    			'nama' => $faker->name,
    			'nim' => $faker->postcode,
    			'alamat' => $faker->address,
    		]);
        }
        
    }
}

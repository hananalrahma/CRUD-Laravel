<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {

            // insert data ke tabel employees

            DB::table('employees')->insert([
                'nama' => $faker->name,
                'jabatan' => $faker->jobTitle,
                'umur' => $faker->numberBetween(25, 60),
                'email' => $faker->email,
                'alamat' => $faker->address,
                'no_hp' => $faker->phoneNumber
            ]);
        }
    }
}

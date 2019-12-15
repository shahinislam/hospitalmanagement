<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LoginTableSeeder::class);
         $this->call(AdminTableSeeder::class);
         $this->call(DoctorTableSeeder::class);
         $this->call(PatientTableSeeder::class);
    }
}

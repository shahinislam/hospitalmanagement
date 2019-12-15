<?php

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor=new \App\Doctor();
        $doctor->name="doctor1";
        $doctor->email="doctor1@test.com";
        $doctor->password=bcrypt("test_pw");
        $doctor->address="Sylhet";
        $doctor->phone="0123";
        $doctor->department="Cardiology";
        $doctor->profile="Doctor";
        $doctor->save();

        $doctor=new \App\Doctor();
        $doctor->name="doctor2";
        $doctor->email="doctor2@test.com";
        $doctor->password=bcrypt("test_pw");
        $doctor->address="Sylhet";
        $doctor->phone="0123";
        $doctor->department="Cardiology";
        $doctor->profile="Doctor";
        $doctor->save();

        $doctor=new \App\Doctor();
        $doctor->name="doctor3";
        $doctor->email="doctor3@test.com";
        $doctor->password=bcrypt("test_pw");
        $doctor->address="Sylhet";
        $doctor->phone="0123";
        $doctor->department="Cardiology";
        $doctor->profile="Doctor";
        $doctor->save();
    }
}

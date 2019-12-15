<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor=new \App\Patient();
        $doctor->name="patient1";
        $doctor->email="patient1@test.com";
        $doctor->password=bcrypt("test_pw");
        $doctor->address="Sylhet";
        $doctor->phone="0123";
        $doctor->sex="Male";
        $doctor->birth="2/10/1990";
        $doctor->age="27";
        $doctor->blood="B+";
        $doctor->save();

        $doctor=new \App\Patient();
        $doctor->name="patient2";
        $doctor->email="patient2@test.com";
        $doctor->password=bcrypt("test_pw");
        $doctor->address="Sylhet";
        $doctor->phone="0123";
        $doctor->sex="Female";
        $doctor->birth="2/10/1990";
        $doctor->age="27";
        $doctor->blood="A-";
        $doctor->save();

        $doctor=new \App\Patient();
        $doctor->name="patient3";
        $doctor->email="patient3@test.com";
        $doctor->password=bcrypt("test_pw");
        $doctor->address="Sylhet";
        $doctor->phone="0123";
        $doctor->sex="Male";
        $doctor->birth="2/10/1990";
        $doctor->age="27";
        $doctor->blood="B+";
        $doctor->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class LoginTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $login=new \App\Login();
        $login->type="admin";
        $login->email="admin1@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="admin";
        $login->email="admin2@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="admin";
        $login->email="admin3@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="doctor";
        $login->email="doctor1@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="doctor";
        $login->email="doctor2@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="doctor";
        $login->email="doctor3@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="patient";
        $login->email="patient@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="nurse";
        $login->email="nurse@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="pharmacist";
        $login->email="pharmacist@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="laboratorist";
        $login->email="laboratorist@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();

        $login=new \App\Login();
        $login->type="acountant";
        $login->email="accountant@test.com";
        $login->password=bcrypt("test_pw");
        $login->save();
    }
}

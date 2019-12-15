<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new \App\Admin();
        $admin->name="admin1";
        $admin->email="admin1@test.com";
        $admin->password=bcrypt("test_pw");
        $admin->address="Sylhet";
        $admin->phone="0123";
        $admin->save();

        $admin=new \App\Admin();
        $admin->name="admin2";
        $admin->email="admin2@test.com";
        $admin->password=bcrypt("test_pw");
        $admin->address="Sylhet";
        $admin->phone="0123";
        $admin->save();

        $admin=new \App\Admin();
        $admin->name="admin3";
        $admin->email="admin3@test.com";
        $admin->password=bcrypt("test_pw");
        $admin->address="Sylhet";
        $admin->phone="0123";
        $admin->save();
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
                'alias' => 'Nacho',
                'email' => 'nacholo@mail.com',
                'password' => Hash::make('pass123'),
                'age' => '1989-05-24',
                'gender' => 'M'
            ],[
                'alias' => 'Cristina',
                'email' => 'skiza@mail.com',
                'password' => Hash::make('qwerty'),
                'age' => '1985-11-05',
                'gender' => 'F'
            ],[
                'alias' => 'Ciprian',
                'email' => 'axomme@mail.com',
                'password' => Hash::make('yolo87'),
                'age' => '1987-12-24',
                'gender' => 'M'
            ]
        ]);
    }
}

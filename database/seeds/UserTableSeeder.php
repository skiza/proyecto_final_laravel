<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i= 1 ; $i <= 10 ;$i++){
            $user = [
                'alias'=> 'alias'.$i,
                'email' => 'name'.$i.'@mail.com',
                'password' => Hash::make($i.'password'),
                'age' => '1993-05-21',
                'gender' => 'M',
                'weight' => $i+70,
                'height' => $i+175,
                'privacy_id' => 1,
                'status_id' => 1,
            ];

            User::create($user);
        }
        
       /* $cris = [
                'alias'=> 'cristina',
                'email' => 'cristi@example.com',
                'password' => Hash::make('cris123'),
                'age' => '21-05-1993',
                'gender' => 'F',
                'privacy_id' => 1,
                'status_id' => 1,
            ];
        User::create($cris);    */
    }
}

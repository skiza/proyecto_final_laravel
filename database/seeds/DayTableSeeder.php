<?php

use Illuminate\Database\Seeder;
use App\Day;

class DayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::insert([
            [
                'name' => '{ "es" : "Lunes", "en" : "Monday" }'
            ],[
                'name' => '{ "es" : "Martes", "en" : "Tuesday" }'
            ],[
                'name' => '{ "es" : "Miercoles", "en" : "Wednesday" }'
            ],[
                'name' => '{ "es" : "Jueves", "en" : "Thursday" }'
            ],[
                'name' => '{ "es" : "Viernes", "en" : "Friday" }'
            ],[
                'name' => '{ "es" : "Sabado", "en" : "Saturday" }'
            ],[
                'name' => '{ "es" : "Domingo", "en" : "Sunday" }'
            ]
        ]);
    }
}

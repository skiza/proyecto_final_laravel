<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => '{ "es" : "Pectoral", "en" : "Pectoral" }'
            ],[
                'name' => '{ "es" : "Dorsal", "en" : "Dorsal" }'
            ],[
                'name' => '{ "es" : "Hombros", "en" : "Shoulders" }'
            ],[
                'name' => '{ "es" : "Biceps", "en" : "Biceps" }'
            ],[
                'name' => '{ "es" : "Triceps", "en" : "Triceps" }'
            ],[
                'name' => '{ "es" : "Piernas", "en" : "Legs" }'
            ],[
                'name' => '{ "es" : "Abdominal", "en" : "Abs" }'
            ],[
                'name' => '{ "es" : "Cardio", "en" : "Cardio" }'
            ]
        ]);
    }
    
}

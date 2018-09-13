<?php

use Illuminate\Database\Seeder;
use App\Privacy;

class PrivacyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Privacy::insert([
            [
                'name' => '{ "es" : "Publico", "en" : "Public" }',
                'description' => '{ "es" : "Privacidad publica de un usuario o rutina. Los demas lo pueden ver.", "en" : "Public privacy of a user or routine. Others can see him/it." }'
            ],[
                'name' => '{ "es" : "Privado", "en" : "Private" }',
                'description' => '{ "es" : "Privacidad privada de un usuario o rutina. Los demas no lo pueden ver.", "en" : "Private privacy of a user or routine. Others can\'t see him/it." }'
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'name' => '{ "es" : "Desbloqueado", "en" : "Unblocked" }',
                'description' => '{ "es" : "Estado desbloqueado para un usuario. Estado por defecto de un usuario.", "en" : "Unblocked status for a user. Default status of a user." }'
            ],[
                'name' => '{ "es" : "Bloqueado", "en" : "Blocked" }',
                'description' => '{ "es" : "Estado bloqueado para un usuario. Normas de la comunidad infringidas.", "en" : "Blocked status for a user. Community terms broken." }'
            ],[
                'name' => '{ "es" : "Borrado", "en" : "Deleted" }',
                'description' => '{ "es" : "Estado borrado para un usuario. Baja voluntaria.", "en" : "Deleted status for a user. Voluntary resignation." }'
            ]
        ]);
    }
}

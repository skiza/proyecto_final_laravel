<?php

use Illuminate\Database\Seeder;
use App\Workout;

class WorkoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workout::insert([
            // Pectoral
            [
                'name' => '{ "es" : "Press Banca", "en" : "Bench Press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular pectoral", "en" : "Workout for the pectoral muscle group" }',
                'link' => '7aQY3u0Dk-Q',
                'category_id' => 1
            ],[
                'name' => '{ "es" : "Press sentado", "en" : "Sitting Press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular pectoral", "en" : "Workout for the pectoral muscle group" }',
                'link' => 'Krm-8CRZyss',
                'category_id' => 1
            ],[
                'name' => '{ "es" : "Press inclinado", "en" : "Inclined Press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular pectoral", "en" : "Workout for the pectoral muscle group" }',
                'link' => '2bKcaD7lHLs',
                'category_id' => 1
            ],[
                'name' => '{ "es" : "Pullover Pectoral", "en" : "Pectoral Pullover" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular pectoral", "en" : "Workout for the pectoral muscle group" }',
                'link' => '5XO5KyDUAbE',
                'category_id' => 1
            ],[
                'name' => '{ "es" : "Aperturas pectoral", "en" : "Pectoral Openings" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular pectoral", "en" : "Workout for the pectoral muscle group" }',
                'link' => 'xyHdY99F640',
                'category_id' => 1
            ],[
                'name' => '{ "es" : "Fondos en paralelas pectoral", "en" : "Paralel backings pectoral" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular pectoral", "en" : "Workout for the pectoral muscle group" }',
                'link' => '1Vm1ATIi0AE',
                'category_id' => 1
            ],[
                'name' => '{ "es" : "Peck deck", "en" : "Peck deck" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular pectoral", "en" : "Workout for the pectoral muscle group" }',
                'link' => 'ODU0bvLkwbY',
                'category_id' => 1
            ],[
                'name' => '{ "es" : "Cruce Poleas", "en" : "Handless Cross" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular pectoral", "en" : "Workout for the pectoral muscle group" }',
                'link' => 'XnaMi2Gb_9Q',
                'category_id' => 1
            ],
            // Dorsal
            [
                'name' => '{ "es" : "Dominadas", "en" : "Chin up" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular dorsal", "en" : "Workout for the dorsal muscle group" }',
                'link' => 'tQxbnI3QFBE',
                'category_id' => 2
            ],[
                'name' => '{ "es" : "Jalon tras nuca", "en" : "Back Pulldown" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular dorsal", "en" : "Workout for the dorsal muscle group" }',
                'link' => 'OhkMdW8NJuU',
                'category_id' => 2
            ],[
                'name' => '{ "es" : "Jalon al pecho", "en" : "Seated Lat Pulldown" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular dorsal", "en" : "Workout for the dorsal muscle group" }',
                'link' => '2EDiwtQRJhA',
                'category_id' => 2
            ],[
                'name' => '{ "es" : "Pullover Dorsal", "en" : "Dorsal Pullover" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular dorsal", "en" : "Workout for the dorsal muscle group" }',
                'link' => '_XkepJQpZDM',
                'category_id' => 2
            ],[
                'name' => '{ "es" : "Remo bajo polea", "en" : "Rowing pull" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular dorsal", "en" : "Workout for the dorsal muscle group" }',
                'link' => 'AQC-p3qANRc',
                'category_id' => 2
            ],[
                'name' => '{ "es" : "Remo mancuerna", "en" : "Rowing dumbell" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular dorsal", "en" : "Workout for the dorsal muscle group" }',
                'link' => 'e1gfbC9Zikk',
                'category_id' => 2
            ],[
                'name' => '{ "es" : "Remo alto", "en" : "High rowing" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular dorsal", "en" : "Workout for the dorsal muscle group" }',
                'link' => 'CV0y9OWHjzI',
                'category_id' => 2
            ],[
                'name' => '{ "es" : "Remo barra", "en" : "Bar rowing" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular dorsal", "en" : "Workout for the dorsal muscle group" }',
                'link' => 'YfNpoC5FuXk',
                'category_id' => 2
            ],
            // Hombros
            [
                'name' => '{ "es" : "Press militar", "en" : "Militar press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular hombros", "en" : "Workout for the shoulder muscle group" }',
                'link' => '8_whF4Z7WTI',
                'category_id' => 3
            ],[
                'name' => '{ "es" : "Elevaciones laterales hombros", "en" : "Shoulder lateral elevation" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular hombros", "en" : "Workout for the shoulder muscle group" }',
                'link' => 'TP6P8-gojO8',
                'category_id' => 3
            ],[
                'name' => '{ "es" : "Elevaciones frontales hombros", "en" : "Shoulder frontal elevation" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular hombros", "en" : "Workout for the shoulder muscle group" }',
                'link' => 'D8hurTiV4Lo',
                'category_id' => 3
            ],[
                'name' => '{ "es" : "Elevaciones barra frontal", "en" : "Bar frontal elevation" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular hombros", "en" : "Workout for the shoulder muscle group" }',
                'link' => 'sbxcuplK0qU',
                'category_id' => 3
            ],[
                'name' => '{ "es" : "Pajaro", "en" : "Bird" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular hombros", "en" : "Workout for the shoulder muscle group" }',
                'link' => 'cXCr4E0mqp4',
                'category_id' => 3
            ],[
                'name' => '{ "es" : "Press tras nuca", "en" : "Back shoulder press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular hombros", "en" : "Workout for the shoulder muscle group" }',
                'link' => '4yW3HcoKGgc',
                'category_id' => 3
            ],[
                'name' => '{ "es" : "Rotaciones hombros", "en" : Shoulder rotation" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular hombros", "en" : "Workout for the shoulder muscle group" }',
                'link' => 'OerJVUeaHKw',
                'category_id' => 3
            ],[
                'name' => '{ "es" : "Press mancuerna hombros", "en" : "Shoulder dumbell press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular hombros", "en" : "Workout for the shoulder muscle group" }',
                'link' => 'I8-L89ee9qY',
                'category_id' => 3
            ],
            // Biceps  
            [
                'name' => '{ "es" : "Curl barra", "en" : "Bar curl" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular biceps", "en" : "Workout for the biceps muscle group" }',
                'link' => '9LwedVKzjk8',
                'category_id' => 4
            ],[
                'name' => '{ "es" : "Curl maquina", "en" : "Machine curl" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular biceps", "en" : "Workout for the biceps muscle group" }',
                'link' => '1PpaNdXHXKQ',
                'category_id' => 4
            ],[
                'name' => '{ "es" : "Curl martillo", "en" : "Hammer curl" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular biceps", "en" : "Workout for the biceps muscle group" }',
                'link' => 'exobXrvhQ_o',
                'category_id' => 4
            ],[
                'name' => '{ "es" : "Curl Scott", "en" : "Scott curl" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular biceps", "en" : "Workout for the biceps muscle group" }',
                'link' => 'b3AS1l41jHM',
                'category_id' => 4
            ],[
                'name' => '{ "es" : "Curl polea", "en" : "Pulley curl" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular biceps", "en" : "Workout for the biceps muscle group" }',
                'link' => '7Jc4jHxax60',
                'category_id' => 4
            ],[
                'name' => '{ "es" : "Curl concentrado", "en" : "Focused curl" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular biceps", "en" : "Workout for the biceps muscle group" }',
                'link' => 'fiLgeWlBGTQ',
                'category_id' => 4
            ],[
                'name' => '{ "es" : "Curl 21", "en" : "Curl 21" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular biceps", "en" : "Workout for the biceps muscle group" }',
                'link' => '0AzOIeoJaRw',
                'category_id' => 4
            ],[
                'name' => '{ "es" : "Dominadas en barra biceps", "en" : "Biceps chin up bar" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular biceps", "en" : "Workout for the biceps muscle group" }',
                'link' => '_7rWrkWGkUA',
                'category_id' => 4
            ],
            // Triceps  
            [
                'name' => '{ "es" : "Press frances", "en" : "French press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular triceps", "en" : "Workout for the triceps muscle group" }',
                'link' => 'rSFXvdNnxms',
                'category_id' => 5
            ],[
                'name' => '{ "es" : "Polea triceps", "en" : "Pulley triceps" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular triceps", "en" : "Workout for the triceps muscle group" }',
                'link' => 'cGEPFQ99pyQ',
                'category_id' => 5
            ],[
                'name' => '{ "es" : "Fondos paralelas triceps", "en" : "Dips" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular triceps", "en" : "Workout for the triceps muscle group" }',
                'link' => 'x-NL9aMyJng',
                'category_id' => 5
            ],[
                'name' => '{ "es" : "Tiron tras nuca", "en" : "Back triceps throw" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular triceps", "en" : "Workout for the triceps muscle group" }',
                'link' => 't8vIrZwZMvg',
                'category_id' => 5
            ],[
                'name' => '{ "es" : "Fondos entre bancos", "en" : "Bench dips" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular triceps", "en" : "Workout for the triceps muscle group" }',
                'link' => '82TCWKG-R8o',
                'category_id' => 5
            ],[
                'name' => '{ "es" : "Patada trasera triceps", "en" : "Back kick triceps" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular triceps", "en" : "Workout for the triceps muscle group" }',
                'link' => 'zQLzE8c5cyg',
                'category_id' => 5
            ],[
                'name' => '{ "es" : "Mancuernas press frances", "en" : "Dumbell French press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular triceps", "en" : "Workout for the triceps muscle group" }',
                'link' => 'v-_TkF44I5U',
                'category_id' => 5
            ],[
                'name' => '{ "es" : "Press cerrado", "en" : "Closed press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular triceps", "en" : "Workout for the triceps muscle group" }',
                'link' => 'lLvsx4KeBcA',
                'category_id' => 5
            ],
            // Piernas
            [
                'name' => '{ "es" : "Extensiones maquina pierna", "en" : "Machine leg extension" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular piernas", "en" : "Workout for the legs muscle group" }',
                'link' => 'd2ucfROskeA',
                'category_id' => 6
            ],[
                'name' => '{ "es" : "Prensa piernas", "en" : "Leg press" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular piernas", "en" : "Workout for the legs muscle group" }',
                'link' => 'Mf3kspbGvBY',
                'category_id' => 6
            ],[
                'name' => '{ "es" : "Zancadas", "en" : "High Strides" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular piernas", "en" : "Workout for the legs muscle group" }',
                'link' => '8D3WvncVNZQ',
                'category_id' => 6
            ],[
                'name' => '{ "es" : "Femoral tumbado", "en" : "Lying down femoral" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular piernas", "en" : "Workout for the legs muscle group" }',
                'link' => 'eDH51N-lAUg',
                'category_id' => 6
            ],[
                'name' => '{ "es" : "Apertura maquina piernas", "en" : "Machine open leg" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular piernas", "en" : "Workout for the legs muscle group" }',
                'link' => '0ncwzC3C1Qc',
                'category_id' => 6
            ],[
                'name' => '{ "es" : "Sentadillas", "en" : "Squats" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular piernas", "en" : "Workout for the legs muscle group" }',
                'link' => 'l8fqKyVYbJI',
                'category_id' => 6
            ],[
                'name' => '{ "es" : "Elevacion talon", "en" : "Heel elevation" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular piernas", "en" : "Workout for the legs muscle group" }',
                'link' => 'RLX8HFAOIhg',
                'category_id' => 6
            ],[
                'name' => '{ "es" : "Sentadilla hack", "en" : "Hack squat" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular piernas", "en" : "Workout for the legs muscle group" }',
                'link' => 'UGwJSxjnDmY',
                'category_id' => 6
            ],
            
            // Abdominales
            [
                'name' => '{ "es" : "Abdominales bicicleta", "en" : "Bicycle abdominal" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular abdominal", "en" : "Workout for the abdominal muscle group" }',
                'link' => '0Y5Vi5ZE4-s',
                'category_id' => 7
            ],[
                'name' => '{ "es" : "Twist ruso", "en" : "Russian twist" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular abdominal", "en" : "Workout for the abdominal muscle group" }',
                'link' => '6MaGBhDDZ5w',
                'category_id' => 7
            ],[
                'name' => '{ "es" : "Elevaciones de pierna", "en" : "Legs up" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular abdominal", "en" : "Workout for the abdominal muscle group" }',
                'link' => '4oYU_1HjbtM',
                'category_id' => 7
            ],[
                'name' => '{ "es" : "Crunch", "en" : "Crunch" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular abdominal", "en" : "Workout for the abdominal muscle group" }',
                'link' => 'JWUyng_c-G0',
                'category_id' => 7
            ],[
                'name' => '{ "es" : "Doble crunch", "en" : "Double crunch" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular abdominal", "en" : "Workout for the abdominal muscle group" }',
                'link' => 'TcATCqoGLh0',
                'category_id' => 7
            ],[
                'name' => '{ "es" : "Mountain climbers", "en" : "Mountain climbers" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular abdominal", "en" : "Workout for the abdominal muscle group" }',
                'link' => 'IfNxtI5oMVM',
                'category_id' => 7
            ],[
                'name' => '{ "es" : "Abdominales en V", "en" : "V abdominal" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular abdominal", "en" : "Workout for the abdominal muscle group" }',
                'link' => 'xUsHyWZGm0w',
                'category_id' => 7
            ],[
                'name' => '{ "es" : "Crunch con giro", "en" : "Turn crunch" }',
                'description' => '{ "es" : "Ejercicio de grupo muscular abdominal", "en" : "Workout for the abdominal muscle group" }',
                'link' => '2wWt7bWlxQw',
                'category_id' => 7
            ],
            
             // Cardio
            [
                'name' => '{ "es" : "Correr", "en" : "Running" }',
                'description' => '{ "es" : "Ejercicio de cardio", "en" : "Cardio workout" }',
                'link' => ' lZJoT7JB_kw',
                'category_id' => 8
            ],[
                'name' => '{ "es" : "Bicicleta eliptica", "en" : "Elliptical bike" }',
                'description' => '{ "es" : "Ejercicio de cardio", "en" : "Cardio workout" }',
                'link' => 'XHK068Kknis',
                'category_id' => 8
            ],[
                'name' => '{ "es" : "Step up", "en" : "Step up" }',
                'description' => '{ "es" : "Ejercicio de cardio", "en" : "Cardio workout" }',
                'link' => '-Kx86JXqy_8',
                'category_id' => 8
            ],[
                'name' => '{ "es" : "Saltar a la comba", "en" : "Jump rope" }',
                'description' => '{ "es" : "Ejercicio de cardio", "en" : "Cardio workout" }',
                'link' => 'h1kRFvlsiqQ',
                'category_id' => 8
            ],
            // ...to be continued when all the info is recollected for both spanish and english workout names and descriptions
        ]);
    }
}

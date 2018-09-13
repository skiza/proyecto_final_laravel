<?php

use Illuminate\Database\Seeder;
use App\Routine;
use App\Workout;
use App\User;


class RoutineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cont = 0;
        for ($i= 1 ; $i <= 10 ;$i++){
            for($j=1; $j<=10; $j++){
                $cont++;
                
                $routine = [
                    
                    'name' => 'routine'.$j,
                    'description' => 'This is a description'.$j,
                    'likes'=>$j,
                    'user_id' =>  $i,
                    'privacy_id' => 1,
                ];
    
                Routine::create($routine);
                
                $rutina = Routine::find($cont);
                
                
                $workout_1 = Workout::find(1);
                
                $rutina->workout()->attach(1, ['sets' => rand(1,3), 'reps' => rand(8,15)]);
                $rutina->categories()->attach( $workout_1->category_id);
                $rutina->days()->attach(1);
                
                $workout_2 = Workout::find(10);
                
                $rutina->workout()->attach(10, ['sets' => rand(1,3), 'reps' => rand(8,15)]);
                $rutina->categories()->attach( $workout_2->category_id);
                $rutina->days()->attach(3);
               
                $workout_3 = Workout::find(2);
                
                $rutina->workout()->attach(2, ['sets' => rand(1,3), 'reps' => rand(8,15)]);
                $rutina->days()->attach(2);
            }
            
        }
        
        for ($i= 1 ; $i <= 10 ;$i++){
            User::find($i)->likes()->attach(rand(1,100));
        }
        
    }
}

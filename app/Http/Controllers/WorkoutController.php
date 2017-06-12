<?php

namespace App\Http\Controllers;

use App\Workout;
use App\Routine;
use App\Category;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    
    //  /**
    //  * All user list
    //  *
    //  * @return void
    //  */
    // public function index()
    // {
    //     $workouts = Workout::paginate(8);
        
    //     $response = [
    //         'workouts' => $workouts,
    //     ];
       
    //     return view('www.content.workout.index', $response);
    // }
    
    // public function listWorkoutByCategory(Request $request)
    // {
    //     $workouts = Workout::where('category_id', $request->id)->paginate(8);
        
    //     $response = [
    //         'workouts' => $workouts,
    //         'route_parameters' => ['id' => $request->id], // para pasar el parametro a la vista 
    //     ];
        
    //     return view('www.content.workout.listworkoutbycategory', $response);
    // }
}

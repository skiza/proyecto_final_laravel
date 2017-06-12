<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Day;
use App\Routine;

class DayController extends Controller
{
    // return all week days
    public function calendary() {
        $days = Day::all();
        
        $response = [
            'days' => $days
        ];
        
        return $response;
    }
    
    // return a certain day of the week
    public function getDay(Request $request) {
        $day = Day::find($request->id);
        
        $response = [
            'day' => $day
        ];
        
        return $response;
    }
    
    public function show()
    {
        $days = Day::all();
      
        $routines = new Collection();
        
        foreach($days as $day){
          $routines->push( $day->routine->where('user_id', auth()->id()) );
        }
        
        $response = [
            'days' => $days,  
            'routines' => $routines
        ];
        
        return view('www.content.calendar.show' , $response);
    }
    
    public function edit(Request $request) {
        $day = Day::find($request->id_day);
        
        $routines = Routine::where('user_id', auth()->id())->get();
        
        $routines_by_day = $day->routine->where('user_id', auth()->id());
        
        $response = [
            'route_parameters'  => $day,
            //'day'               => $day,
            'routines'          => $routines,
            'routines_by_day'   => $routines_by_day
        ];
        
        return view('www.content.calendar.edit', $response);
    }
    
    public function editPost(Request $request) {
        $day = Day::find($request->id_day);
        
        $data = '';
        
        $routines_by_day = $day->routine->where('user_id', auth()->id());
        
        if ($routines_by_day->contains('id', $request->id_routine)) {
           $day->routine()->detach( $request->id_routine);
            
            $data = 'ok';
        }
        else {
             $day->routine()->attach( $request->id_routine);
            
            $data = 'ok';
        }
        return $data;
    }
}

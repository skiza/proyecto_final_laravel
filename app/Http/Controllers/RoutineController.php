<?php

namespace App\Http\Controllers;

use App\Routine;
use App\Workout;
use App\Privacy;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoutineController extends Controller
{
    /**
     * Display a listing of the routine.
     *
     * @return \Illuminate\Http\Response
     */
    public function topTen()
    {
        $top_10_likes = Routine::orderBy('likes', 'desc')->where('privacy_id', '=', 1)->limit(10)->get();
        $top_10_created= Routine::orderby('created_at','desc')->where('privacy_id','=',1)->limit(10)->get();
        $categories = Category::all();
        
        $response = [
            'top_10_likes'     => $top_10_likes,
            'top_10_created'   => $top_10_created,
            'categories'        => $categories
        ];
        
        //dd($response);
        
        return view('www.content.routine.top',$response);
    }
    
    
     /**
     * Display a listing of the routine by category
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $categories = Category::all();
        
        $category_id = $request->category_id;
        
        $category = Category::find($category_id);
        
        $routines = $category->routine()->where('privacy_id' , '1')->get();
      
        
        
        $response = [
            'routines'          => $routines, 
            'categories'        =>$categories
        ];
        
        return view('www.content.routine.search',$response);
    }
    
    
    /**
     * Display a listing of the routine.
     *
     * @return \Illuminate\Http\Response
     */
    public function userRoutines()
    {
        $user_id =  auth()->id();
        
        $routines = Routine::where('user_id', $user_id)->paginate(8);
        
        $response = [
            'routines'          => $routines, 
            'route_parameters'  => $user_id  
        ];
        
        return view('www.content.routine.index',$response);
    }
    
    
    
    
    /**
     * Show the form for creating a new routine.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm()
    {
        $privacies = Privacy::all();
        
        $response = [
            'privacies' =>  $privacies,
        ];
        
        return view('www.content.routine.new',$response);
    }

    /**
     * Store a newly created routine in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $params = $request->all();
        $params['user_id'] = auth()->id();
        
       
         $validator = Validator::make($params,
            [ 
                'name'          =>  'required|string',
                'description'   =>  'nullable|string',
                'privacy_id'    =>  'required',        
            ]
         );
         
        if ($validator->fails()) {
            return redirect(nt_route('routine_new-'.user_lang()))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Store 
        Routine::create($params);
       
        return redirect(nt_route('routine_user-'.user_lang()));
    }

    /**
     * Display the specified routine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $routine_id = request()->route()->parameters['id_routine'];
       
        $routine = Routine::find($routine_id);
        
        if($routine->privacy->name['en'] == 'Private'){
            // compruebo si es el propietario de la rutina
             // si el check es null no entra en el if
            if($check = $this->routineOwner($routine_id))
            {
                return $check;
            }
        }
        
        $response = [
            'route_parameters'  => $routine_id,
            'routine'       =>  $routine
        ];
        
        return view('www.content.routine.show', $response);
    }

    /**
     * Show the form for editing the specified routine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEditForm($id_routine)
    {
        $routine_id = request()->route()->parameters['id_routine'];
        
         // compruebo si es el propietario de la rutina
        if($check = $this->routineOwner($routine_id))
        {
            return $check;
        }
        
        $routine = Routine::find($routine_id);
        $privacies = Privacy::all();
        
        $response = [
            'route_parameters'  =>  $routine_id,
            'routine'           =>  $routine,
            'privacies'         =>  $privacies
        ];
        
        return view('www.content.routine.edit', $response);
        
    }

    /**
     * Update the specified routine in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $routine_id = $request->id_routine;
        
         // compruebo si es el propietario de la rutina
        if($check = $this->routineOwner($routine_id))
        {
            return $check;
        }
        
        $params = $request->all();
        
        $validator = Validator::make($params,
            [ 
                'name'          =>  'required|string',
                'description'   =>  'nullable|string',
                'privacy_id'    =>  'required',        
            ]
         );
         
        if ($validator->fails()) {
            return redirect( nt_route('routine_edit-'.user_lang(),['id_routine' => $routine_id]) )
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $routine = Routine::find($routine_id)->update($params);
        
        
        
        $response = [
            'route_parameters'  => $routine_id,
        ];
        
        return redirect(nt_route('routine_detail-'.user_lang(),['id_routine' => $routine_id ]) )->with('action_status' , 'Rutina actializada');
    }
    
    /**
     * Show types of wokouts
     * 
     */
    public function chooseCategory(){
        $routine_id = request()->route()->parameters['id_routine'];
        $categories = Category::all();
        
        
        // compruebo si es el propietario de la rutina
        if($check = $this->routineOwner($routine_id))
        {
            return $check;
        }
        
       
        $routine = Routine::find($routine_id);
        
        $routine_workouts = $routine->workout;
        $routine_categories = [];
        
        if($routine_workouts ){
            foreach ($routine_workouts as $workout) {
                $routine_categories[] = $workout->category_id;
            }
        }
        
        $response = [
            'route_parameters'      =>  $routine_id,
            'categories'            =>  $categories,
            'routine'               =>  $routine,
            'routine_categories'    =>  $routine_categories
        ];
        
        return view('www.content.routine.categories',$response);
    }
    
    
    
    
    /**
     * Caterory selected
     * Return workouts list of selected category
     */
    public function chooseCategoryPost(){
        $routine_id = request()->route()->parameters['id_routine'];
        $category_id = request()->route()->parameters['id_category'];
        
        // compruebo si es el propietario de la rutina
        if($check = $this->routineOwner($routine_id))
        {
            return $check;
        }
        
        // obtengo la rutina
        $user_routine = Routine::find($routine_id);
        
        // obtengo TODOS los workouts de la categoria selectionada
        $workouts = Workout::where('category_id' , $category_id)->get();
        
        if(!empty($user_routine)){
            $user_workouts = $user_routine->workout->where('category_id',$category_id);
            
            if(!empty($user_workouts) ){
                $user_workouts_id = $user_workouts->pluck('id')->toArray();
                
                $workouts = $workouts->whereNotIn('id', $user_workouts_id);
            }
        }else{
            return redirect( nt_route('routine_user-'.user_lang() ));
        }
      
        // category name
        $category_name = (Category::find($category_id))->name;
        
        $response = [
            'route_parameters'  =>  [ 'id_routine' => $routine_id , 'id_category' => $category_id],
            'workouts'          =>  $workouts,
            'user_workouts'     =>  $user_workouts,
            'routine_id'        =>  $routine_id,
            'category_id'       =>  $category_id,
            'category_name'     =>  $category_name
        ];
        
        return view('www.content.routine.workouts', $response);
    }
    
    
    
     /**
     * Add or Remove Routine workouts
     * Return workouts list of selected category
     */
    public function chooseWorkoutsPost(Request $request){
        $routine_id = request()->route()->parameters['id_routine'];
        $category_id = request()->route()->parameters['id_category'];
        
        // compruebo si es el propietario de la rutina
        if($check = $this->routineOwner($routine_id))
        {
            return $check;
        }
        
        $params = $request->all();
        
        $validator = Validator::make($params,
            [ 
                'reps_*' => 'numeric|nullable'
            ]
         );

        if ($validator->fails()) {
            return redirect(nt_route('routine_add_workout_1_post-'.user_lang(), ['id_routine' => $routine_id, 'id_category' => $category_id ]))
                        ->withErrors($validator)
                        ->withInput()
                        ->with('action_status' , 'error al guardar los workouts!');
        }
        
        $user_routine = Routine::find($routine_id);
       
        $user_workouts = $user_routine->workout->where('category_id',$category_id);
        
        if(!empty($user_workouts) ){
            foreach ($user_workouts as $workout) {
                if(!isset($params['workouts'][$workout->id])){ // comprueba si alguno que estaba guardado se ha desseleccionado, si es esa lo borra
                    $user_routine->workout()->detach($workout->id);
                }
            }
            
           $user_routine->categories()->detach($category_id);
        }
     
        
        // agrego los nuevos ejercicos si los hay
       if(isset($params['workouts'])){
            // guardo un ejercicio x cada rutina    
             foreach($params['workouts'] as $work_id  ){
                
                $work_reps = 0;
                $work_sets = 0;
                
                if($params['sets_'.$work_id] != null){ 
                    $work_sets = $params['sets_'.$work_id];
                }
                
                if($params['reps_'.$work_id] != null){
                    $work_reps = $params['reps_'.$work_id];
                }
                
                $workout = $user_routine->workout->where('id' , $work_id)->first();
                
                
              if($workout){
                   $user_routine->workout()->updateExistingPivot($work_id, ['sets' => $work_sets, 'reps' => $work_reps]);
              }else{
                  $user_routine->workout()->attach($work_id, ['sets' => $work_sets, 'reps' => $work_reps]);
              }
              
            }
            // asigno la categoria a esta rutina
            $user_routine->categories()->attach($category_id);
            
            $action_status = 'Ejercicios guardados';
        }else{
             // compruebo si esta rutina tiene la categoria
            $there_are_category = $user_routine->workout->where('category_id',$category_id);
            
            // si esta asignada esta categoria a la rutina se la quito , ya que no hay ejercicios seleccionados
            if(!empty($there_are_category )){
                $user_routine->categories()->detach($category_id);
            }
            
            $action_status = 'En la rutina no hay ejercicios de esta categoria';
        }
        
        return redirect(nt_route('routine_add_workout_1-'.user_lang(),['id_routine' => $routine_id]))->with('action_status' ,$action_status);
    }
    
    
    
    
    /**
     * 
     * Show form to edit reps and steps from a user workout
     * 
     */
    public function showEditWorkoutForm(Request $request){
        $routine_id = request()->route()->parameters['id_routine'];
        $workout_id = request()->route()->parameters['id_workout'];
        
         // compruebo si es el propietario de la rutina
         // si el check es null no entra en el if
        if($check = $this->routineOwner($routine_id))
        {
            return $check;
        }
        
        $workout = Routine::find($routine_id)->workout()->where('id' , $workout_id)->get()->first();
        
        // si no existe el workout
        if(!$workout){
            return redirect( nt_route('routine_user-'.user_lang()) ) -> with('action_status' , 'Acción denegada');
        }
        
        $response = [
            'route_parameters'  => [ 'id_routine' => $routine_id, 'id_workout' => $workout_id],
            'workout'           => $workout,
            'routine_id'        => $routine_id
        ];
        
        return view('www.content.routine.edit-workout' , $response);
    }
    
    
    
    /**
     * 
     * Edit reps and steps from a user workout
     * 
     */
    public function editUserWorkout(Request $request){
        $routine_id = request()->route()->parameters['id_routine'];
        $workout_id = request()->route()->parameters['id_workout'];
        
        // compruebo si es el propietario de la rutina
         // si el check es null no entra en el if
        if($check = $this->routineOwner($routine_id))
        {
            return $check;
        }
        
        $params = $request->all();
       
        $validator = Validator::make($params,
            [ 
                'sets' => 'nullable|numeric',
                'reps' => 'nullable|numeric'
            ]
         );

        if ($validator->fails()) {
            return redirect(nt_route('routine_edit_user_workout_post-'.user_lang(),['id_routine' => $routine_id , 'id_workout' => $workout_id ]))
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $work_sets = null;
        $work_reps = null;
        
        if($request->sest){
            $work_sets = $request->sets ;
        } 
        
        if($request->reps){
            $work_reps = $request->reps ;
        } 
        
        $routine = Routine::find($routine_id);
        
        $routine->workout()->updateExistingPivot($workout_id, ['sets' => $work_sets, 'reps' => $work_reps]);
        
         return redirect(nt_route('routine_detail-'.user_lang(),['id_routine' => $routine_id ]) )->with('action_status' , 'Workout actializado');
    }
    
    
    /**
     *
     * Remove workout from Routine (Ajax)
     *
     * 
     */
    public function removeWorkout($id_rout,$id_work)
    {
        $routine_id = request()->route()->parameters['id_rout'];
        $workout_id = request()->route()->parameters['id_work'];
        
        
        // compruebo si es el propietario de la rutina
        if($check = $this->routineOwner($routine_id))
        {
            return $check;
        }
        
        $workout = Workout::find($workout_id);
        $routine = Routine:: find($routine_id);
        
        
        
        // delete the category from a routine if the workout is the only one from that category
        $there_are_category = $routine->workout->where('category_id',$workout->category_id);
        
        if(count($there_are_category )<=1){
            $routine->categories()->detach($workout->category_id);
        }
        
        // delete workout routine 
        $routine->workout()->detach($workout_id);
        
        return 'true';
    }
    
    
     /**
     * 
     * user like routine
     * 
     */
    public function like(Request $request){
        $routine_id = $request->id_routine;
        
        $routine = Routine::find($routine_id);
        
        $user_id = auth()->id();
        
        $likes = $routine->my_likes;
        
        if( $likes->contains(auth()->id()) ){
            $routine->my_likes()->detach($user_id);
            
            $routine->update(['likes' => ($routine->likes - 1) ]);
            
            return 'ok';
        }else{
            $routine->my_likes()->attach($user_id);
          
            $routine->update(['likes' => ($routine->likes + 1) ]);
            
            return 'ok';
        }
       
       
    }
    
    
     /**
     * 
     *
     * Routine datail to start
     * 
     */
    public function start(Request $request){
        
        $routine_id = $request->id_routine;
        $routine =  Routine::find($routine_id);
        
        // compruebo si es el propietario de la rutina
            
        if($routine){
            if($routine->user_id != auth()->id() && ($routine->privacy->name['en']) == 'Private'){
                return redirect( nt_route('routine_user-'.user_lang()) ) -> with('action_status' , 'Acción denegada');
            }
        }
        
        $response = [
            'route_parameters'  => ['id_routine' => $routine_id],
            'routine' => $routine
        ];
        
        if(count($routine->workout) == 0){
            return redirect(nt_route('routine_user-'.user_lang()))->with('action_status' , 'Aun no hay workouts en esta rutina');
        }
        
        return view('www.content.routine.start', $response);
    }


    /**
     * Remove the specified routine from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $routine_id = $request->route()->parameters['id_routine'];
        
        $routine = Routine::find($routine_id); 
        
        // compruebo si es el propietario de la rutina
            if($routine->user_id != auth()->id()){
                return null; 
            }
        
        // delete categories form routine
            $categories = $routine->categories;
            
            if($categories){
                foreach ($categories as $category) {
                    $routine->categories()->detach($category->id);
                }
            }
            
         // delete days form routine
            $days = $routine->days;
            
            
            if($days){
                foreach ($days as $day) {
                    
                    $routine->days()->detach($day->id);
                }
            }  
            
        
        // delete workouts from routine
            $workouts = $routine->workout;
           
            if($workouts){
                foreach($workouts as $workout){
                    $routine->workout()->detach($workout->id);
                }
            }
            
        // delete routine
        $routine->delete();
        
        $redirect = $request->route()->parameters['redirect'];
        
        // 
        if($redirect){
            return redirect( nt_route('routine_user-'.user_lang()) ) -> with('action_status' , 'Rutina eliminada');
        }else{
             return 'ok';
        }
    }
    
    
     /**
     * 
     *
     * Check if auth user is the Routine Owner
     * 
     */
    public function routineOwner($routine_id){
        
        $redirect = false;
        
        if($routine_id){
            $routine = Routine::find($routine_id);
            
            if($routine){
                if($routine->user_id != auth()->id()){
                    $redirect = true;
                }
            }else{
                $redirect = true;
            }
        }else{
            $redirect = true;
        }
        
        if($redirect){
           return redirect( nt_route('routine_user-'.user_lang()) ) -> with('action_status' , 'Acción denegada');
        }
        
        return null;
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "workouts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'link', 'category_id'
    ];
    
    protected $casts = [
        'name' => 'json',
        'description' => 'json'
    ];

    // It doesn't need timestamps
    public $timestamps = false;

    // A Workout has a category
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // A Workout is in many routines
    public function routine() {
        return $this->belongsToMany('App\Routine', 'routine_workout')->withPivot('sets', 'reps');
    }
}

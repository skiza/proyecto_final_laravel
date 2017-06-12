<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "routines";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','likes', 'user_id', 'privacy_id'
    ];

    // A Routine has a privacy
    public function privacy() {
        return $this->belongsTo('App\Privacy');
    }

    // A Routine has one or many categories
    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_routines');
    }

    // A Routines can appear in many days
    public function days() {
        return $this->belongsToMany('App\Day', 'days_routines');
    }

    // A Routine is liked by many users
    public function my_likes() {
        return $this->belongsToMany('App\User', 'routines_users');
    }

    // A Routine has a user
    public function user() {
        return $this->belongsTo('App\User');
    }

    // A Routine has many workouts
    public function workout() {
        return $this->belongsToMany('App\Workout', 'routines_workouts')->withPivot('sets', 'reps');
    }
}

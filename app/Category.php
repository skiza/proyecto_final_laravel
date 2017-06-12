<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "categories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    
    protected $casts = [
        'name' => 'json'
    ];

    // It doesn't need timestamps
    public $timestamps = false;

    // A Category has many workouts
    public function workout(){
        return $this->hasMany('App\Workout');
    }

    // A Category appears in many routines
    public function routine(){
        return $this->belongsToMany('App\Routine', 'categories_routines');
    }
}

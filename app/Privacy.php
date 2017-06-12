<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "privacies";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    protected $casts = [
        'name' => 'json',
        'description' => 'json'
    ];

    // It doesn't need timestamps
    public $timestamps = false;

    // A Privacy has many users
    public function user(){
        return $this->hasMany('App\User');
    }

    // A privacy has many routines
    public function routine(){
        return $this->hasMany('App\Routine');
    }
}

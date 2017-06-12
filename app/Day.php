<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'days';

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

    // A Day can appear in many routines
    public function routine() {
        return $this->belongsToMany('App\Routine', 'days_routines');
    }
}
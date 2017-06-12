<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    
    protected $guard = 'admin';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias', 'email', 'password','age','gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // It doesn't need timestamps
    public $timestamps = false;

    // A Admin can create many statuses
    public function status() {
        return $this->hasMany('App\Status');
    }

    // A Admin can create many privacies
    public function privacy() {
        return $this->hasMany('App\Privacy');
    }

    // A Admin can create many categories
    public function category() {
        return $this->hasMany('App\Category');
    }

    // A Admin can create many workouts
    public function workout() {
        return $this->hasMany('App\Workout');
    }
}

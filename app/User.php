<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias', 'email', 'password','age','gender','weight','height','privacy_id','status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // User has a status
    public function status() {
        return $this->belongsTo('App\Status');
    }

    // User has a privacy
    public function privacy() {
        return $this->belongsTo('App\Privacy');
    }

    // User can like many routines
    public function likes() {
        return $this->belongsToMany('App\Routine', 'routines_users');
    }

    // User can create many routines
    public function routine() {
        return $this->hasMany('App\Routine');
    }
    
    
}

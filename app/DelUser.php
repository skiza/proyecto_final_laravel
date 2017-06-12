<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DelUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'del_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userID', 'alias', 'email', 'password','age','gender','weight','height','privacy_id','status_id', 'stored_routines',
    ];
    
    protected $casts = [
        'stored_routines' => 'json'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

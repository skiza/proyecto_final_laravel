<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    protected $casts = [
        'name' => 'json',
        'description' => 'json',
    ];
    
    // It doesn't need timestamps
    public $timestamps = false;

    // A Status can belong to many users
    public function user() {
        return $this->hasMany('App\User');
    }
}

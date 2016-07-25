<?php

namespace App;

// use \Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Cache;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * These columns will be interpreted as instances of Carbon.
     *
     * @var array
     */
    protected $dates = ['last_login'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question')->orderBy('created_at', 'desc');
    }

    /**
     * Get the comments that belong to the user
    */
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    /**
     * Tells if a user is online and active using cache table.
     *
     * @var boolean
     */
    public function isOnline()
    {
        return Cache::has('user-activity-' . $this->id) ?: false;
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Question', 'favorites')->withTimestamps();
    }
}

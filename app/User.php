<?php

namespace App;

// use \Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Cache;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use Sluggable;
    
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

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function questions()
    {
        return $this->hasMany('App\Question')->orderBy('created_at', 'desc');
    }

    public function discussions()
    {
        return $this->hasMany('App\Discussion')->orderBy('created_at', 'desc');
    }

    /**
     * Get the comments that belong to the user
    */
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    /**
     * Get the discussion resposes that belong to the user
    */
    public function responses()
    {
        return $this->hasMany('App\Response')->orderBy('created_at', 'desc');
    }

    /**
     * Tells if a user is online and active using cache table.
     *
     * @var boolean
     */
    public function isOnline()
    {
        return Cache::has('user-activity-' . $this->id);
    }

    /**
     * Retrieve user's favorite questions
     * 
     * @return 
     */
    public function favorites()
    {
        return $this->belongsToMany('App\Question', 'favorites')->withTimestamps();
    }

    /**
     * Retrieve user's ($num) most recent favorite questions
     * 
     * @param Integer
     * @return 
     */
    public function recentFavorites($num)
    {
        return $this->favorites()->orderBy('favorites.created_at', 'desc')->take($num);
    }

    /**
     * Retrieve user's activities
     * 
     * @param Integer $numberOfActivities
     * @return 
     */
    public function activities()
    {
        $questions = collect($this->questions);
        $comments = collect($this->comments);
        $discussions = collect($this->discussions);
        $responses = collect($this->responses);

        return $questions->merge($comments)
                         ->merge($discussions)
                         ->merge($responses)
                         ->sortByDesc('created_at');
    }

}

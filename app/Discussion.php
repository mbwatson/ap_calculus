<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var Array
     */
    protected $fillable = [
        'title', 'body', 'user_id', 'channel_id'
    ];
    
    /**
     * Retrieve the user that owns the discussion
     *
     * @return App\User
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * Retrieve the responses that belong to the discussion
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function responses()
    {
    	return $this->hasMany('App\Response');
    }

    /**
     * Retrieve the channel that owns the discussion
     *
     * @return App\Channel
     */
    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

}

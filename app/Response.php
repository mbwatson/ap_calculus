<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discussion_id', 'user_id', 'body'
    ];
    
	/**
	 * Get the question that owns the comment
	*/
    public function discussion()
    {
    	return $this->belongsTo('App\Discussion');
    }

    /**
     * Get the user that owns the comment
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

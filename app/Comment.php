<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
	 * Get the question that owns the comment
	*/
    public function question()
    {
    	return $this->belongsTo('App\Post');
    }

    /**
     * Get the user that owns the comment
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

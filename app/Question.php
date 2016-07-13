<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
	// Get the user that owns the post
	
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

	// Get the comments that belong to the post
	
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    // Get standards associated with the post
    
    public function standards()
    {
        return $this->belongsToMany('App\Standard');
    }
}

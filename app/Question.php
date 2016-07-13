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
        return $this->belongsToMany('App\Standard')->orderBy('name');
    }

    public function mpacs()
    {
        return $this->standards()->where('type', 'MPAC');
    }
    
    public function learningObjectives()
    {
        return $this->standards()->where('type', 'Learning Objective');
    }

    /**
     * Get a list of standard ids associated with current question
     *
     * @return array
     */
    public function getStandardIdsAttribute()
    {
        return $this->standards->lists('id')->toArray();
    }
}

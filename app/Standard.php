<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{

	/**
     * Get the questions associated to the current standard
     *
     * @return 
     */
	public function questions()
    {
        return $this->belongsToMany('App\Question')->orderBy('created_at', 'desc');
    }

    /**
     * Get the parent of the current standard
     *
     * @return Standard
     */
    public function parent()
    {
    	return Standard::find($this->parent_id);
    }

    /**
     * Get information about the current standard in the form [ 'name: description' ]
     *
     * @return string
     */
    public function getStandardInfoAttribute()
    {
        return $this->attributes['name'] . ': ' . $this->attributes['description'];
    }

    /**
     * Get only standards that are mpacs
     * @param string
     * @return collection
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }


}

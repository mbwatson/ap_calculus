<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'description', 'parent_id'
    ];

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
    	return $this->belongsTo('App\Standard')->where('id', $this->parent_id);
    }

    /**
     * Get information about the current standard in the form [ 'name: description' ]
     *
     * @return String
     */
    public function getStandardInfoAttribute()
    {
        return $this->attributes['name'] . ': ' . $this->attributes['description'];
    }
}
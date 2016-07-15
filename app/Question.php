<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Markdown;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'user_id'
    ];

    /**
     * Return body of question with markdown rendered.
     * 
     * @param 
     * @return 
     */
    public function renderMarkdown()
    {
        return Markdown::convertToHtml($this->body);
    }

    /**
     * Get the user that owns the post
     *
     * @return User
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * Get the comments that belong to the post
     *
     * @return array
     */
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    /**
     * Get standards associated with the post
     *
     * @return array
     */
    public function standards()
    {
        return $this->belongsToMany('App\Standard')->orderBy('name');
    }

    /**
     * Get only MPAC standards associated with the post
     *
     * @return array
     */
    public function mpacs()
    {
        return $this->standards()->where('type', 'MPAC');
    }
    
    /**
     * Get only learning objective standards associated with the post
     *
     * @return array
     */
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

    public function favorites()
    {
        return $this->belongsToMany('App\User', 'favorites')->withTimestamps();
    }
    
}

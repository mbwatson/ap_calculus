<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Markdown;
use PDF;

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
     * @return String
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

    /**
     * Return users who have favorited this question.
     *
     * @return Array
     */
    public function favorites()
    {
        return $this->belongsToMany('App\User', 'favorites')->withTimestamps();
    }
    
    public function scopeWithAnyKeywords($query, $keywords)
    {
        $keywords = explode(' ', $keywords);
        
        foreach ($keywords as $keyword) {
            $query->orWhere('title', 'LIKE', '%'.$keyword.'%')->orWhere('body', 'LIKE', '%'.$keyword.'%');
        }

        return $query;
    }

    public function scopeWithAllKeywords($query, $keywords)
    {
        $keywords = explode(' ', $keywords);
        
        foreach ($keywords as $keyword) {
            $query->where('title', 'LIKE', '%'.$keyword.'%')->orWhere('body', 'LIKE', '%'.$keyword.'%');
        }

        return $query;
    }

    /**
     * Retrieve all questions with standards overlapping with those in a given array
     * 
     * @param 
     * @return 
     */
    public function scopeWithStandards($query, $ids)
    {
        if ($ids) {
            $query->whereHas('standards', function($query) use ($ids) {
                $query->whereIn('standard_id', $ids);
            });
        }

        return $query;
    }

    protected $calc = [
        -1 => 'Inactive',
        0 => 'Neutral',
        1 => 'Active'
    ];
    
    /**
     * 
     * 
     * @param 
     * @return 
     */
    public function getCalculatorAttribute($value)
    {
        return $this->calc[$value];
    }

    protected $types = [
        1 => 'Free Response',
        2 => 'Multiple Choice'
    ];

    /**
     * 
     * 
     * @param 
     * @return 
     */
    public function getTypeAttribute($value)
    {
        return $this->types[$value];
    }

}

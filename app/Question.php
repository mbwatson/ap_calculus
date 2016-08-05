<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Markdown;
use PDF;

class Question extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var Array
     */
    protected $fillable = [
        'title', 'body', 'user_id', 'type', 'calculator'
    ];
    
    /**
     * Get the user that owns the question
     *
     * @return App\User
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * Get the comments that belong to the question
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    /**
     * Get standards associated with the question
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function standards()
    {
        return $this->belongsToMany('App\Standard')->orderBy('name');
    }

    /**
     * Get only MPAC standards associated with the question
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function mpacs()
    {
        return $this->standards()->where('type', 'MPAC');
    }
    
    /**
     * Get only learning objective standards associated with the post
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function learningObjectives()
    {
        return $this->standards()->where('type', 'Learning Objective');
    }

    /**
     * Get a list of standard ids associated with current question
     *
     * @return Array
     */
    public function getStandardIdsAttribute()
    {
        return $this->standards->lists('id')->toArray();
    }

    /**
     * Return users who have favorited this question.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function favorites()
    {
        return $this->belongsToMany('App\User', 'favorites')->withTimestamps();
    }
    
    /**
     * 
     * 
     * @param  Array
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithAnyKeywords($query, $keywords)
    {
        $keywords = explode(' ', $keywords);
        
        foreach ($keywords as $keyword) {
            $query->orWhere('title', 'LIKE', '%'.$keyword.'%')->orWhere('body', 'LIKE', '%'.$keyword.'%');
        }

        return $query;
    }

    /**
     * 
     * 
     * @param  Array
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithAllKeywords($query, $keywords)
    {
        $keywords = explode(' ', $keywords);
        
        foreach ($keywords as $keyword) {
            $query->where('title', 'LIKE', '%'.$keyword.'%')->orWhere('body', 'LIKE', '%'.$keyword.'%');
        }

        return $query;
    }

    /**
     * Find all calculator inactive questions.
     * 
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeCalculatorInactive($query)
    {
        return $query->where('calculator', 0);
    }

    /**
     * Find all calculator neutral questions.
     * 
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeCalculatorNeutral($query)
    {
        return $query->where('calculator', 0);
    }

    /**
     * Find all calculator active questions.
     * 
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeCalculatorActive($query)
    {
        return $query->where('calculator', 1);
    }

    /**
     * Find all questions with standards overlapping with those in a given array
     * 
     * @param  Array
     * @return Illuminate\Database\Eloquent\Builder
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

    // Array of database encoding of calculator activity options
    protected $calc = [
        0 => 'Inactive',
        1 => 'Active'
    ];
    
    /**
     * Use $calc array to get string associated with integer coding the calculator active information about a question.
     * 
     * @return String
     */
    public function getCalculatorAttribute($value)
    {
        return $this->calc[$value];
    }

    // Array of database encoding of question types
    protected $types = [
        1 => 'Free Response',
        2 => 'Multiple Choice'
    ];

    /**
     * Return string associated with question type; that is, Multiple Choice or Free Response.
     * 
     * @return String
     */
    public function getTypeAttribute($value)
    {
        return $this->types[$value];
    }

    public function lastActivityTime()
    {
        return max( $this->comments()->latest()->first()->created_at, $this->updated_at );
    }

    public function thumbsUpCount()
    {
        return rand(1, 25);
    }

}

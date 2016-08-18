<?php

namespace App;

use \DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDF;
use DraperStudio\Likeable\Contracts\Likeable;
use DraperStudio\Likeable\Traits\Likeable as LikeableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Question extends Model implements Likeable
{
    use SoftDeletes;
    use LikeableTrait;
    use Sluggable;
    
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
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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
        foreach ($keywords as $keyword) {
            $query->orWhere('title', 'LIKE', '%'.$keyword.'%')->orWhere('body', 'LIKE', '%'.$keyword.'%');
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

    public function scopeFreeResponse($query)
    {
        return $query->where('type', 1);
    }

    public function scopeMultipleChoice($query)
    {
        return $query->where('type', 2);
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

    public function scopePopular($query)
    {
        $popularIds = DB::table('likes_counter')->select('likeable_id')
                                                ->where('likeable_type', 'App\Question')
                                                ->where('count', '>=', 'global.numberOfLikesToBePopular')
                                                ->lists('likeable_id');
        
        return Question::latest('created_at')->whereIn('id', $popularIds);
    }

    public function likers()
    {
        return User::whereIn('id', $this->likes()->lists('liked_by_id'));
    }
}

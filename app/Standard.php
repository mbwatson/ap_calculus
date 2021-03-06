<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Standard extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
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
     * @return \Illuminate\Database\Eloquent\Relations\...
     */
	public function questions()
    {
        if ($this->type == "MPAC") {
            return $this->belongsToMany('App\Question')->orderBy('created_at', 'desc');
        }
        if ($this->type == "Big Idea") {
            $eu_ids = Standard::where('parent_id', $this->id)->lists('id');
            $lo_ids = Standard::whereIn('parent_id', $eu_ids)->lists('id');
            $questions = Question::select('questions.*', 'standards.parent_id')
                                 ->join('question_standard', 'question_standard.question_id', '=', 'questions.id')
                                 ->join('standards', 'standards.id', '=', 'question_standard.standard_id')
                                 ->whereIn('question_standard.standard_id', $lo_ids)
                                 ->distinct();
            return $questions;
        }
        if ($this->type == "Enduring Understanding") {
            $standard_ids = Standard::where('parent_id', $this->id)->lists('id');
            $questions = Question::select('questions.*', 'standards.parent_id')
                                 ->join('question_standard', 'question_standard.question_id', '=', 'questions.id')
                                 ->join('standards', 'standards.id', '=', 'question_standard.standard_id')
                                 ->whereIn('question_standard.standard_id', $standard_ids)
                                 ->distinct();
            return $questions;
        }
        if ($this->type == "Learning Objective") {
            return $this->belongsToMany('App\Question')->orderBy('created_at', 'desc');
        }
    }
    
    /**
     * Get the children of the current standard
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function children()
    {
        return $this->where('parent_id', $this->id);
    }

    /**
     * Get the parent of the current standard
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Standard')->where('id', $this->parent_id);
    }

    /**
     * Retrieve only MPACs and LOs
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTaggable($query)
    {
        return $query->whereIn('type', ['MPAC', 'Learning Objective']);
    }

    /**
     * Scope a query to include only those of a given type
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
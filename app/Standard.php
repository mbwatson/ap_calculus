<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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
     * @return \Illuminate\Database\Eloquent\Relations\...
     */
	public function questions()
    {
        if ($this->type == "MPAC") {
            return $this->belongsToMany('App\Question')->orderBy('created_at', 'desc');
        }
        if ($this->type == "Big Idea") {
            $standard_ids = Standard::where('parent_id', $this->id)->lists('id');
            $questions = Question::select('questions.*', 'standards.parent_id')
                                 ->join('question_standard', 'question_standard.question_id', '=', 'questions.id')
                                 ->join('standards', 'standards.id', '=', 'question_standard.standard_id')
                                 ->whereIn('question_standard.standard_id', $standard_ids)
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
     * Get information about the current standard in the form [ 'name: description' ]
     *
     * @return String
     */
    public function getStandardInfoAttribute()
    {
        return $this->attributes['name'] . ': ' . $this->attributes['description'];
    }

}
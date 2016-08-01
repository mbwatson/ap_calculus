<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'user_id', 'body'
    ];
    
	/**
	 * Get the question that owns the comment
	*/
    public function question()
    {
    	return $this->belongsTo('App\Question');
    }

    /**
     * Get the user that owns the comment
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

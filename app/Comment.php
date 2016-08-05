<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DraperStudio\Likeable\Contracts\Likeable;
use DraperStudio\Likeable\Traits\Likeable as LikeableTrait;

class Comment extends Model implements Likeable
{

    use LikeableTrait;
    
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

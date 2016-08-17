<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DraperStudio\Likeable\Contracts\Likeable;
use DraperStudio\Likeable\Traits\Likeable as LikeableTrait;

class Response extends Model implements Likeable
{
    use LikeableTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discussion_id', 'user_id', 'body'
    ];
    
	/**
	 * Get the question that owns the comment
	 */
    public function discussion()
    {
    	return $this->belongsTo('App\Discussion');
    }

    /**
     * Get the user that owns the comment
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likers()
    {
        return User::whereIn('id', $this->likes()->lists('liked_by_id'));
    }
}

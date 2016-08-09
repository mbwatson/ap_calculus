<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DraperStudio\Likeable\Contracts\Likeable;
use DraperStudio\Likeable\Traits\Likeable as LikeableTrait;
use \DB;

class Discussion extends Model implements Likeable
{
    use SoftDeletes;
    use LikeableTrait;
    
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
        'title', 'body', 'user_id', 'channel_id'
    ];
    
    /**
     * Retrieve the user that owns the discussion
     *
     * @return App\User
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * Retrieve the responses that belong to the discussion
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function responses()
    {
    	return $this->hasMany('App\Response');
    }

    /**
     * Retrieve the channel that owns the discussion
     *
     * @return App\Channel
     */
    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function scopeInChannel($query, $id)
    {
        return Discussion::latest('created_at')->where('channel_id', $id);
    }

    public function scopePopular($query)
    {
        $popularIds = DB::table('likes_counter')->select('likeable_id')
                                                ->where('likeable_type', 'App\Discussion')
                                                ->where('count', '>=', config('global.numberOfLikesToBePopular'))
                                                ->lists('likeable_id');
        
        return Discussion::latest('created_at')->whereIn('id', $popularIds);
    }


}

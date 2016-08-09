<?php

namespace App;

use \DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DraperStudio\Likeable\Contracts\Likeable;
use DraperStudio\Likeable\Traits\Likeable as LikeableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Discussion extends Model implements Likeable
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
        'title', 'body', 'user_id', 'channel_id'
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

    public function scopeInChannel($query, Channel $channel)
    {
        return Discussion::latest('created_at')->where('channel_id', $channel->id);
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

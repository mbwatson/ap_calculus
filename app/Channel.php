<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Channel extends Model
{
    use SoftDeletes;
    use Sluggable;

    /**
     * These attributes are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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
     * Get the discussions that belong to this channel
     *
     * @return \Illuminate\Database\Eloquent\Relations\...
     */
	public function discussions()
    {
        return $this->hasMany('App\Discussion')->orderBy('created_at', 'desc');
    }
    
}

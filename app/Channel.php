<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    use SoftDeletes;

    /**
     * These attributes are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

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

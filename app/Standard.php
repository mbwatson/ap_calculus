<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    public function questions()
    {
        return $this->belongsToMany('App\Question')->orderBy('created_at', 'desc');
    }
}

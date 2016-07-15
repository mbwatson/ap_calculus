<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
	use SoftDeletes;
	
	public $timestamps = true;
    
    protected $fillable = [ 'user_id', 'question_id' ];

    //
}

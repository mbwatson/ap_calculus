<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder {
	public function run()
	{

    	factory(App\Comment::class, 50)->create();

	}
}
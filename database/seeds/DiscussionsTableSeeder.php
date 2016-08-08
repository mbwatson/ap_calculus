<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Discussion::class, 25)->create();

		foreach (App\Discussion::all() as $discussion) {
			$discussion->slug = str_slug($discussion->title);
			$discussion->save();
		}
	}
}

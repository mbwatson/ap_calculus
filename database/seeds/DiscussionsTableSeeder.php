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
	}
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Response::class, 50)->create();
    }
}

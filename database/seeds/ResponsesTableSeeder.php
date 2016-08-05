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
		DB::table('responses')->delete();

		$seeds = array(
			array(
				'id' => 1,
				'body' => 'Here is a response to your awesome discussion!',
				'discussion_id' => 1,
				'user_id' => 2,
				'created_at' => Carbon::now()->addSeconds(1)->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->addSeconds(1)->format('Y-m-d H:i:s')
			),
			array(
				'id' => 1,
				'body' => 'I think it\'s going well!',
				'discussion_id' => 1,
				'user_id' => 2,
				'created_at' => Carbon::now()->addSeconds(2)->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->addSeconds(2)->format('Y-m-d H:i:s')
			),
		);

		DB::table('responses')->insert($seeds);
    }
}

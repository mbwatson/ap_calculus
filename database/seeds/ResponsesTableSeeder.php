<?php

use Illuminate\Database\Seeder;

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
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
		);

		DB::table('responses')->insert($seeds);
    }
}

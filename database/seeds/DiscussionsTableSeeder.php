<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('discussions')->delete();

		$seeds = array(
			array(
				'id' => 1,
				'title' => 'First Discussion',
				'body' => 'Here is the body of the first discussion ever started!',
				'channel_id' => 1,
				'user_id' => 1,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
		);

		DB::table('discussions')->insert($seeds);
	}
}

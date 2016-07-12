<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('questions')->delete();

		$seeds = array(
			array(
				'title' => 'Sample Title',
				'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'user_id' => 1,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),

			array(
				'title' => 'Another Title',
				'body' => 'Question body. Question body. Question body. Question body. Question body.',
				'user_id' => 2,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			)
		);

		DB::table('questions')->insert($seeds);
	}
}
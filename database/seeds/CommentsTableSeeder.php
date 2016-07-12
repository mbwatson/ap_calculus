<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('comments')->delete();

		$seeds = array(
			array(
				'user_id' => '1',
				'question_id' => '1',
				'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'user_id' => '2',
				'question_id' => '2',
				'body' => 'Lorem ipsum dolor sit ah whatever...',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'user_id' => '1',
				'question_id' => '2',
				'body' => 'Here is a comment. 

				What do you think?',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			)
		);

		DB::table('comments')->insert($seeds);
	}
}
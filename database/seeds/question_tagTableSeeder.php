<?php

use Illuminate\Database\Seeder;

class question_tagTableSeeder extends Seeder {
	public function run()
	{
		DB::table('question_tag')->delete();

		$seeds = array(
			array( 'question_id' => 1, 'tag_id' => 1 ),
			array( 'question_id' => 1, 'tag_id' => 2 ),
			array( 'question_id' => 2, 'tag_id' => 1 ),
			array( 'question_id' => 2, 'tag_id' => 3 )
		);

		DB::table('question_tag')->insert($seeds);
	}
}
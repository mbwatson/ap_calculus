<?php

use Illuminate\Database\Seeder;

class question_standardTableSeeder extends Seeder {
	public function run()
	{
		DB::table('question_standard')->delete();

		$seeds = array(
			array( 'question_id' => 1, 'standard_id' => 1 ),
			array( 'question_id' => 1, 'standard_id' => 2 ),
			array( 'question_id' => 2, 'standard_id' => 1 ),
			array( 'question_id' => 2, 'standard_id' => 3 )
		);

		DB::table('question_standard')->insert($seeds);
	}
}
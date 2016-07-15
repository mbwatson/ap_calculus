<?php

use Illuminate\Database\Seeder;

class question_standardTableSeeder extends Seeder {
	public function run()
	{
		DB::table('question_standard')->delete();

		$seeds = array(
			[ 'question_id' => 1, 'standard_id' => 1 ],
			[ 'question_id' => 1, 'standard_id' => 2 ],
			[ 'question_id' => 1, 'standard_id' => 3 ],
			[ 'question_id' => 1, 'standard_id' => 5 ],
			[ 'question_id' => 1, 'standard_id' => 6 ],
			[ 'question_id' => 1, 'standard_id' => 60 ],
			[ 'question_id' => 1, 'standard_id' => 61 ],
			[ 'question_id' => 1, 'standard_id' => 62 ],
			[ 'question_id' => 1, 'standard_id' => 64 ],
			[ 'question_id' => 2, 'standard_id' => 1 ],
			[ 'question_id' => 2, 'standard_id' => 2 ],
			[ 'question_id' => 2, 'standard_id' => 3 ],
			[ 'question_id' => 2, 'standard_id' => 4 ],
			[ 'question_id' => 2, 'standard_id' => 6 ],
			[ 'question_id' => 2, 'standard_id' => 28 ],
			[ 'question_id' => 2, 'standard_id' => 35 ],
			[ 'question_id' => 2, 'standard_id' => 49 ],
			[ 'question_id' => 2, 'standard_id' => 52 ],
			[ 'question_id' => 3, 'standard_id' => 3 ],
		);

		DB::table('question_standard')->insert($seeds);
	}
}
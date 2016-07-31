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
			[ 'question_id' => 4, 'standard_id' => 3 ],
			[ 'question_id' => 4, 'standard_id' => 60 ],
			[ 'question_id' => 4, 'standard_id' => 62 ],
			[ 'question_id' => 4, 'standard_id' => 64 ],
			[ 'question_id' => 5, 'standard_id' => 1 ],
			[ 'question_id' => 5, 'standard_id' => 3 ],
			[ 'question_id' => 5, 'standard_id' => 6 ],
			[ 'question_id' => 5, 'standard_id' => 60 ],
			[ 'question_id' => 5, 'standard_id' => 62 ],
			[ 'question_id' => 5, 'standard_id' => 64 ],
			[ 'question_id' => 6, 'standard_id' => 1 ],
			[ 'question_id' => 6, 'standard_id' => 2 ],
			[ 'question_id' => 6, 'standard_id' => 3 ],
			[ 'question_id' => 6, 'standard_id' => 4 ],
			[ 'question_id' => 6, 'standard_id' => 5 ],
			[ 'question_id' => 6, 'standard_id' => 6 ],
			[ 'question_id' => 6, 'standard_id' => 33 ],
			[ 'question_id' => 6, 'standard_id' => 35 ],
			[ 'question_id' => 6, 'standard_id' => 48 ],
			[ 'question_id' => 6, 'standard_id' => 50 ],
			[ 'question_id' => 7, 'standard_id' => 1 ],
			[ 'question_id' => 7, 'standard_id' => 2 ],
			[ 'question_id' => 7, 'standard_id' => 3 ],
			[ 'question_id' => 7, 'standard_id' => 4 ],
			[ 'question_id' => 7, 'standard_id' => 5 ],
			[ 'question_id' => 7, 'standard_id' => 6 ],
			[ 'question_id' => 7, 'standard_id' => 48 ],
			[ 'question_id' => 7, 'standard_id' => 56 ],
			[ 'question_id' => 8, 'standard_id' => 1 ],
			[ 'question_id' => 8, 'standard_id' => 2 ],
			[ 'question_id' => 8, 'standard_id' => 3 ],
			[ 'question_id' => 8, 'standard_id' => 4 ],
			[ 'question_id' => 8, 'standard_id' => 5 ],
			[ 'question_id' => 8, 'standard_id' => 6 ],
			[ 'question_id' => 8, 'standard_id' => 30 ],
			[ 'question_id' => 8, 'standard_id' => 32 ],
			[ 'question_id' => 8, 'standard_id' => 47 ],
			[ 'question_id' => 8, 'standard_id' => 52 ],
			[ 'question_id' => 8, 'standard_id' => 54 ],
			[ 'question_id' => 8, 'standard_id' => 57 ],
			[ 'question_id' => 9, 'standard_id' => 52 ],
			[ 'question_id' => 9, 'standard_id' => 1 ],
			[ 'question_id' => 9, 'standard_id' => 2 ],
		);

		DB::table('question_standard')->insert($seeds);
	}
}
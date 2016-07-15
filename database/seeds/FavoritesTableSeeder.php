<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('favorites')->delete();

		$seeds = array(
			[ 'user_id' => 1, 'question_id' => 2 ],
		);

		DB::table('favorites')->insert($seeds);
    }
}

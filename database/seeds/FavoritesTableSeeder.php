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
			array(
                'user_id' => 1,
                'question_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ),
		);

		DB::table('favorites')->insert($seeds);
    }
}

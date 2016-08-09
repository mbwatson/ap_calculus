<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('channels')->delete();

		$seeds = array(
			array(
				'id' => 1,
				'name' => 'Standards',
				'slug' => 'standards',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 2,
				'name' => 'Instruction',
				'slug' => 'instruction',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 3,
				'name' => 'Assessment',
				'slug' => 'assessment',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 4,
				'name' => 'Grading',
				'slug' => 'grading',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			)
,
			array(
				'id' => 5,
				'name' => 'Site Feedback',
				'slug' => 'site-feedback',
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			)
		);

		DB::table('channels')->insert($seeds);
    }
}

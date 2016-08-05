<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
				'title' => 'A Discussion',
				'body' => 'Here is the body of the first discussion ever started on this site!

				I hope it is as wodnerful as I think it will be!',
				'channel_id' => 1,
				'user_id' => 1,
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'title' => 'Another Discussion',
				'body' => 'Here is a discussion in another channel.',
				'channel_id' => 2,
				'user_id' => 2,
				'created_at' => Carbon::now()->addSeconds(5)->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->addSeconds(5)->format('Y-m-d H:i:s')
			),
		);

		DB::table('discussions')->insert($seeds);
	}
}

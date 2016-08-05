<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('comments')->delete();

		$seeds = array(
			array(
				'user_id' => '1',
				'question_id' => '1',
				'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'created_at' => Carbon::now()->addSecond(1)->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->addSecond(1)->format('Y-m-d H:i:s')
			),
			array(
				'user_id' => '2',
				'question_id' => '2',
				'body' => 'Vel ultricies non mi. Sapien morbi nullam in commodo volutpat at. Facilisis elementum lobortis augue mattis, odio duis, wisi aenean eu suscipit suscipit habitasse, nec turpis in vel vivamus praesent urna. Erat eget lacus arcu quam ipsum mi, nulla lectus in. Non sit sociis facilisis adipiscing mauris, in a egestas wisi commodo adipiscing, justo ullamcorper massa, tempor ultricies diam aenean condimentum tincidunt, lobortis dictum venenatis. Ornare nec tellus semper. Nulla eu occaecati mauris libero, adipiscing quis, tellus morbi odio congue ridiculus aenean. Ultrices fermentum. Nisl eu neque vel molestie lectus, laoreet diam tellus. Aliquet nullam purus aliquet. Ac neque blandit, commodo nunc magna lacinia, lacus accumsan et mauris donec metus lacus, tincidunt ut a consequat vestibulum neque sem. Nulla felis nisl sit ultricies nam, vel tempus suspendisse ante libero odio sollicitudin, turpis lobortis morbi risus dolor wisi malesuada.',
				'created_at' => Carbon::now()->addSecond(2)->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->addSecond(2)->format('Y-m-d H:i:s')
			),
			array(
				'user_id' => '1',
				'question_id' => '2',
				'body' => 'Here is a comment. 

				What do you think?',
				'created_at' => Carbon::now()->addSecond(3)->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->addSecond(3)->format('Y-m-d H:i:s')
			)
		);

		DB::table('comments')->insert($seeds);
	}
}
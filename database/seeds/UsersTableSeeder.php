<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		DB::table('users')->delete();

		$seeds = array(
			array(
				'id' => 1,
				'name' => 'adminname',
				'email' => 'email@ddress.com',
				'admin' => true,
				'password' => Hash::make('password'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			),
			array(
				'id' => 2,
				'name' => 'username',
				'email' => 'email@ddress.net',
				'admin' => false,
				'password' => Hash::make('password'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			)
		);

		DB::table('users')->insert($seeds);
	}}

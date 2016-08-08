<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
				'name' => 'mwatson',
				'email' => 'email@ddress.com',
				'admin' => true,
				'password' => Hash::make('password'),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			),
			array(
				'id' => 2,
				'name' => 'dingleberry',
				'email' => 'email@ddress.net',
				'admin' => false,
				'password' => Hash::make('password'),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			)
		);

		DB::table('users')->insert($seeds);

    	factory(App\User::class, 13)->create();

	}}

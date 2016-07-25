<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $this->call(UsersTableSeeder::class);
        $this->call(StandardsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(question_standardTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
       // $this->call(FavoritesTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

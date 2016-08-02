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
        $this->call(UsersTableSeeder::class);
        $this->call(StandardsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(question_standardTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(DiscussionsTableSeeder::class);
        $this->call(ResponsesTableSeeder::class);
        $this->call(ChannelsTableSeeder::class);
    }
}

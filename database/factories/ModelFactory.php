<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->userName,
        'email' => $faker->email,
        'admin' => false,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'bio' => $faker->paragraph,
        'location' => $faker->country,
        'private' => rand(0,1),
        'password' => bcrypt('password')
    ];
});

$factory->define(App\Discussion::class, function (Faker\Generator $faker) {
    $channelIds = App\Channel::lists('id')->toArray();
    $userIds = App\User::lists('id')->toArray();
    return [
        'title' => $faker->sentence(4),
        'body' => $faker->paragraph,
        'channel_id' => $faker->randomElement($channelIds),
        'user_id' => $faker->randomElement($userIds)
    ];
});

$factory->define(App\Response::class, function (Faker\Generator $faker) {
    $discussionIds = App\Discussion::lists('id')->toArray();
    $userIds = App\User::lists('id')->toArray();
    return [
        'body' => $faker->paragraph,
        'discussion_id' => $faker->randomElement($discussionIds),
        'user_id' => $faker->randomElement($userIds),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $questionIds = App\Question::lists('id')->toArray();
    $userIds = App\User::lists('id')->toArray();
    return [
        'body' => $faker->paragraph,
        'question_id' => $faker->randomElement($questionIds),
        'user_id' => $faker->randomElement($userIds),
    ];
});

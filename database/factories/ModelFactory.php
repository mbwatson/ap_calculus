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

$factory->define(App\Discussion::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(4),
        'body' => $faker->paragraph,
        'channel_id' => rand(1,4),
        'user_id' => rand(1,2),
    ];
});

$factory->define(App\Response::class, function (Faker\Generator $faker) {
    $discussionIds = App\Discussion::lists('id')->toArray();
    return [
        'body' => $faker->paragraph,
        'discussion_id' => array_rand($discussionIds),
        'user_id' => rand(1,2)
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $questionIds = App\Question::lists('id')->toArray();
    return [
        'body' => $faker->paragraph,
        'question_id' => rand(1,11),
        'user_id' => rand(1,2)
    ];
});

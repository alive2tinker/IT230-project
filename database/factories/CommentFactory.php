<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'contents' => $faker->sentences(6,true),
        'user_id' => factory(\App\User::class),
        'post_id' => factory(\App\Post::class)
    ];
});

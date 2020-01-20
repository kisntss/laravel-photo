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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'password' => '$2y$10$DWLrfsTWBB.VQLVE7ntepugPVvbWmooFkz84HprHvv.QxjeP0IeGO', // kgh1916015011
        'role' => rand(3, 4)
    ];
});

$factory->define(App\Models\CandidateProfile::class, function (Faker\Generator $faker) {
    $user_id = rand(6, 30);
    $fullname = $faker->name;

    return [
        'user_id' => $user_id,
        'avatar' => 'assets/images/candidate\23.png',
        'fullname' => $fullname
    ];
});

$factory->define(App\Models\EmployerProfile::class, function (Faker\Generator $faker) {
    $user_id = rand(6, 30);
    $fullname = $faker->name;

    return [
        'user_id' => $user_id,
        'avatar' => 'assets/images/candidate\23.png',
        'fullname' => $fullname
    ];
});

$factory->define(App\Models\Message::class, function (Faker\Generator $faker) {
    do {
        $from = rand(1, 30);
        $to = rand(1, 30);
        $is_read = rand(0, 1);
    } while ( $from === $to );

    return [
        'from' => $from,
        'to'=> $to,
        'message' => 'Hi, How do you do?',
        'is_read' => $is_read
    ];
});

$factory->define(App\Models\MessageContact::class, function (Faker\Generator $faker) {
    do {
        $user_id = rand(1, 10);
        $friend_id = rand(1, 10);
    } while ( $user_id === $friend_id );

    return [
        'user_id' => $user_id,
        'friend_id' => $friend_id
    ];
});

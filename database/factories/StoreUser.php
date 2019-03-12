<?php

use Faker\Generator as Faker;

$factory->defineAs(App\User::class, 'seed',function (Faker $faker) {
    return [
        'password' => '1234567'
    ];
});

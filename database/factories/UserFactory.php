<?php

use Faker\Generator as Faker;
use App\Role;
use App\User;

$factory->defineAs(User::class, 'networks', function (Faker $faker) {
    return [
          'role_id' => Role::getDefault()->id,
          'verified_token' => $faker->sha1,
          'social_provider_id' => 1,
          'verified' => 1,
          'password' => $faker->password,
          'email' => $faker->email,
          'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
          'gender_id' => rand(1,2),
          'first_name' => $faker->firstName(),
          'last_name' => $faker->lastName()
    ];
});
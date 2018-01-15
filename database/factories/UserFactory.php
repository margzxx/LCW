<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'firstname' => $faker->firstNameFemale,
        'lastname' => $faker->lastName,
        'gender' => 'Female',
        'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'country' => $faker->country,
        'educational_attainment' => 'College Degree',
        'residence' => 'Metro Manila',
        'no_of_dependents' => $faker->randomDigit,
        'course' => 'BSIT',
        'marital_status' => 'Single',
        'mobile_number' => $faker->e164PhoneNumber,
        'role' => 'Client',
        'type' => 'VA',
        'address' => $faker->streetAddress,
        'status' => 1,
        'email' => $faker->unique()->freeEmail,
        'password' => $password ?: $password = bcrypt('connectedwomen2018'),
        'remember_token' => str_random(10),
    ];
});

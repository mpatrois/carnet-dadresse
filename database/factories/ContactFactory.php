<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Contact;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Contact::class, function (Faker $faker) {
    $email = $faker->unique()->safeEmail;
    return [
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstName,
        'email' => $faker->unique()->email,
        'avatar_path' => 'https://i.pravatar.cc/150?u='.$email,
        'mobile_phone' => $faker->e164PhoneNumber,
        'work_phone' => $faker->e164PhoneNumber,
        'street' => $faker->streetAddress,
        'postal_code' => $faker->postcode,
        'city' => $faker->city,
        'other_info' => $faker->realText($maxNbChars = 200),
        'notes' => $faker->realText($maxNbChars = 200)
    ];
});

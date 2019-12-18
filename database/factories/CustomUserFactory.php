<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserModel;
use Faker\Generator as Faker;

$factory->define(UserModel::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->email,
        "phone_number" => $faker->e164PhoneNumber,
        "profile" => str_replace("storage/app/public/", "", $faker->image($dir = 'storage/app/public/upload', $width = 640, $height = 480))
    ];
});

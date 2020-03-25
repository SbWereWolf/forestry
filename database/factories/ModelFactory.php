<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,

    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\WoodSpecie::class, static function (Faker\Generator $faker) {
    return [
        'calculation_period' => $faker->randomNumber(5),
        'main_harvesting_age' => $faker->randomNumber(5),
        'timber_harvesting_age' => $faker->randomNumber(5),
        'title' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Bonitet::class, static function (Faker\Generator $faker) {
    return [
        'code' => $faker->randomNumber(5),
        'remark' => $faker->sentence,
        'title' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TimberClass::class, static function (Faker\Generator $faker) {
    return [
        'code' => $faker->randomNumber(5),
        'remark' => $faker->sentence,
        'title' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ForestResource::class, static function (Faker\Generator $faker) {
    return [
        'bonitet_id' => $faker->randomNumber(5),
        'forest_fund' => $faker->randomNumber(5),
        'timber_class_id' => $faker->randomNumber(5),
        'wood_specie_id' => $faker->randomNumber(5),
        'wood_stock' => $faker->randomNumber(5),


    ];
});

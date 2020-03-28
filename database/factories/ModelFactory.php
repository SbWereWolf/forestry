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
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ForestryIndicator::class, static function (Faker\Generator $faker) {
    return [
        'avrg_bonitet' => $faker->randomNumber(5),
        'avrg_class' => $faker->randomNumber(5),
        'avrg_increase' => $faker->randomNumber(5),
        'avrg_wood_stock' => $faker->randomNumber(5),
        'economical_section_high' => $faker->randomNumber(5),
        'economical_section_low' => $faker->randomNumber(5),
        'operational_fund' => $faker->randomNumber(5),
        'operational_wood_stock' => $faker->randomNumber(5),
        'wood_specie_id' => $faker->sentence,
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CuttingArea::class, static function (Faker\Generator $faker) {
    return [
        'avrg_increase' => $faker->randomNumber(5),
        'cutting_turnover' => $faker->randomNumber(5),
        'first_age' => $faker->randomNumber(5),
        'ripeness' => $faker->randomNumber(5),
        'second_age' => $faker->randomNumber(5),
        'substance' => $faker->randomNumber(5),
        'wood_specie_id' => $faker->sentence,
    ];
});

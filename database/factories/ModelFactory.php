<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Alojamiento::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'direccion' => $faker->sentence,
        'ciudad' => $faker->sentence,
        'departamento' => $faker->sentence,
        'provincia' => $faker->sentence,
        'telefono' => $faker->sentence,
        'web' => $faker->sentence,
        'email' => $faker->email,
        'tipo' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Gastronomium::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Gatronomium::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'direccion' => $faker->sentence,
        'ciudad' => $faker->sentence,
        'departamento' => $faker->sentence,
        'provincia' => $faker->sentence,
        'telefono' => $faker->sentence,
        'web' => $faker->sentence,
        'email' => $faker->email,
        'tipo' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

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
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Departamento::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'descripcion' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Localidade::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'departamento_id' => $faker->sentence,
        'descripcion' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Localidade::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Departamento::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
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
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Gastronomia::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'direccion' => $faker->sentence,
        'email' => $faker->email,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'provincia' => $faker->sentence,
        'telefono' => $faker->sentence,
        'tipo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'web' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Provincia::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'nombre' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Localidade::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'departamento_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Departamento::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'nombre' => $faker->sentence,
        'provincia_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Alojamiento::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Gastronomia::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'direccion' => $faker->sentence,
        'email' => $faker->email,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'telefono' => $faker->sentence,
        'tipo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'web' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Alojamiento::class, static function (Faker\Generator $faker) {
    return [
        'ciudad' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'direccion' => $faker->sentence,
        'email' => $faker->email,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'telefono' => $faker->sentence,
        'tipo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'web' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Alojamiento::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'direccion' => $faker->sentence,
        'email' => $faker->email,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'telefono' => $faker->sentence,
        'tipo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'web' => $faker->sentence,
        
        
    ];
});

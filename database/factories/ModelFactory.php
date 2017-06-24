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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'username' => $faker->unique()->userName,
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->unique()->randomNumber(8, true),
        'adharno' => $faker->unique()->randomNumber(8),
        'role' => $faker->randomElement( array( 'engineer', 'citizen' ) ),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Complaint::class, function (Faker\Generator $faker) {
	return [
		'title' => $faker->sentence(3, true),
		'type' => $faker->randomElement( $type = array( 'Pothole', 'Traffic', 'Accident' ) ),
		'description' => $faker->sentence(8, true),
		'latitude' => $faker->latitude(),
		'longitude' => $faker->longitude(),
		'imagename' => $faker->randomElement( Storage::files('public/uploads') ),
		'user_id' => $faker->randomElement( App\User::pluck('id')->toArray() ),
		'engineer_id' => $faker->randomElement( array_collapse([ [0], App\User::where('role', 'engineer')->pluck('id')->toArray() ]) ),
		'status' => $faker->randomElement( $status = array( 'open', 'working', 'closed' ) ),
		'comment' => $faker->sentence(5, true),
	];
});
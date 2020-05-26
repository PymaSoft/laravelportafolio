<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
  $categories  = Category::pluck('id')->all();

    return [
      'category_id' => $faker->randomElement($categories),
      /* 'title'       => substr($faker->unique()->text($maxNbChars = 50), 0, -1), // Eliminar el punto final (0 Inicial, -1 Final)
      'url'         => $faker->unique()->word(10),
      'description' => $faker->sentence($nbWords = 50), */
      'title'       => $title = $faker->sentence,
      'url'         => Str::slug($title),
      'description' => $faker->paragraph,
    ];
});
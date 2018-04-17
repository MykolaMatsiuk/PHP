<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    $filepath = storage_path('images');
    if(!File::exists($filepath)) {
        File::makeDirectory($filepath);
    }
    return [
        'category_id' => $faker->numberBetween(1,6),
        'title' => substr($faker->sentence(2), 0, -1),
        'content' => $faker->paragraph,
        'pic_src' => $faker->image($filepath,400,300),
    ];
});

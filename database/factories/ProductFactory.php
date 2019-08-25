<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::all()->random()->id,
        'title' => $faker->unique()->jobTitle,
        'description' => $faker->realText(),
        'price' => random_int(100, 1000),
        'product_image' => $faker->imageUrl(),
    ];
});

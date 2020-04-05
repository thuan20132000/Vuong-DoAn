<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\ProductType;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->word,
        'slug'=>$faker->slug,
        'description'=>$faker->paragraphs,
        'image'=>'dss',


    ];
});

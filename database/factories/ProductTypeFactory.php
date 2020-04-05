<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\ProductType;
use Faker\Generator as Faker;

$factory->define(ProductType::class, function (Faker $faker) {
    return [
        //

        'idCategory'=>function(){
            return Category::all()->random();
        },
        'name'=>$faker->word,
        'slug'=>$faker->slug,
        'status'=>1

    ];
});

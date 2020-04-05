<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         factory(Category::class,10)->create();
         factory(ProductType::class,20)->create();
        //  factory(Product::class,150)->create();
        $this->call(ProductSeeder::class);

    }
}

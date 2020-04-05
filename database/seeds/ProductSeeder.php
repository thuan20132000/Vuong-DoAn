<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for($i =0;$i<=100;$i++){
            DB::table('product')->insert([
                'name'=>'product name'.$i,
                'slug'=>'product slug'.$i,
                'description'=>'product description'.$i,
                'image'=>'product image'.$i,
                'quantity'=>$i,
                'price'=>$i,
                'detail'=>'detail'.$i,
                'warranty'=>$i,
                'promotional'=>$i,
                'idProductType'=>rand(1,20),
                'status'=>1
            ]);
        }



    }
}
